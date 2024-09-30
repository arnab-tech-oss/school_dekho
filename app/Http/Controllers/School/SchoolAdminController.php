<?php

namespace App\Http\Controllers\School;

use App\Models\City;
use App\Models\Lead;
use App\Models\User;
use App\Models\State;
use App\Models\School;
use App\Models\Payment;
use App\Models\District;
use App\Models\SchoolFees;
use App\Models\SchoolHour;
use App\Models\SchoolLead;
use App\Models\SchoolSeat;
use App\Models\SchoolAbout;
use App\Models\SchoolBoard;
use App\Models\SchoolClaim;
use App\Models\SchoolImage;
use App\Models\SchoolMedium;
use Illuminate\Http\Request;
use App\Models\SchoolContact;
use App\Models\SchoolAcademic;
use App\Models\SchoolCategory;
use App\Models\SchoolFacility;
use App\Models\SeatAvailability;
use App\Models\SchoolEligibility;
use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\SchoolApplicationFormSettings;

class SchoolAdminController extends Controller
{
    public function index()
    {
        $school_admin_id = Auth::user()->id;
        $claimed_schools_count = SchoolClaim::where('claim_id', $school_admin_id)
            ->where('verify', 0)
            ->count();

        $verified_school_count = SchoolClaim::where('claim_id', $school_admin_id)
            ->where('verify', 9)
            ->count();

        $School_claims = SchoolClaim::where('claim_id', $school_admin_id)
            ->where('verify', 9)->get();
        $all_leads = SchoolLead::with('lead')->get();

        $leads = [];
        foreach ($School_claims as $data) {
            $lead_items = $all_leads->where('school_id', $data->school_id)->values()->toArray();
            $leads = array_merge($leads, $lead_items);
        }
        $lead_count = sizeof($leads);
        $school_id = Payment::where('claim_id', $school_admin_id)->first();

        $total_admission_count = Lead::where('school_id', $school_id->school_id)
            ->where('admission', 1)
            ->count();
        return view('school.dashboard', compact('claimed_schools_count', 'verified_school_count', 'lead_count', 'total_admission_count'));
    }

    public function changepass()
    {
        return view('school.view.changepassword');
    }

    public function changepassword(Request $request)
    {
        $entity = new User();
        if ($request->pass_new == $request->pass_conf) {
            $entity->password = Hash::make($request->pass_new);
            $update = User::where('id', $request->id)->update(['password' => $entity->password]);
            return redirect()->back()->with('message', 'your password has been changed successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'password and confirm passwords are incorrect')->with('message_type', 'danger');
        }
    }

    public function schoollist()
    {
        $id = Auth::user()->id;
        $schoollist = SchoolClaim::with('school', 'payments')->where('claim_id', $id)->get();
        $addedschools = School::where('user_id', $id)->get();
        foreach ($schoollist as $sch) {
            $payments = $sch->payments->sortByDesc("validated_at")->values();
            $expiry_date = null;
            if (sizeof($payments) > 0) {
                $expiry_date = $payments[0]->validated_at;
            }
            $sch->expiry_date = $expiry_date;
        }

        return view('school.view.list', compact('schoollist', 'addedschools'));
    }
    public function addschool()
    {
        $allboards = SchoolBoard::get();
        $allmedium = SchoolMedium::get();
        $allcategory = SchoolCategory::get();
        return view('school.add.index', compact('allboards', 'allmedium', 'allcategory'));
    }
    public function aboutschool()
    {
        $allstates = State::all();
        $allcities = City::all();
        $alldistricts = District::all();
        return view('school.add.about', compact('allstates', 'allcities', 'alldistricts'));
    }

    public function searchschool(Request $request)
    {
        $search_key = explode(',', $request->key);
        foreach ($search_key as $key => $value) {
            $all_schools = School::with('address')->where('name', 'like', '%' . $value . '%')->where('status', 1)->take(10)->get();
        }
        return view('admin.school.view.search', compact('all_schools'));
    }

    public function viewschool($id)
    {
        $user_id = Auth::user()->id;
        $schooldetails = School::where('id', $id)->with('medium', 'categories', 'address')->first();

        $schoolcontact = SchoolContact::where('school_id', $id)->with('cities', 'states')->first();
        $schooleligibility = SchoolEligibility::where('school_id', $id)->first();

        $academics = SchoolAcademic::where('school_id', $id)->latest()->limit(2)->get();
        $payment_status = Payment::with('claim')
            ->where('status', 1)
            ->where('validated_at', '>=', date('Y-m-d H:i:s', time()))
            ->where('claim_id', $user_id)
            ->get();
        $schoolfees = SchoolFees::where('school_id', $id)->first();
        $schoolseats = SeatAvailability::where('school_id', $id)->first();
        $schoolhours = SchoolHour::where('school_id', $id)->first();
        $schoolfeatures = SchoolFacility::where('school_id', $id)->first();
        $schoolimages = SchoolImage::where('school_id', $id)->first();
        $schoolclaims = SchoolClaim::where('school_id', $id)
            ->where('claim_id', $user_id)
            ->count();
        $is_claimed = SchoolClaim::where('school_id', $id)
            ->where('claim_id', $user_id)
            ->where('verify', 1)
            ->count();
        $is_verified = SchoolClaim::where('verify', 1)
            ->where('claim_id', $user_id)
            ->where('school_id', $id)
            ->count();
        $is_subscribed = Payment::where('school_id', $id)
            ->where('claim_id', $user_id)
            ->where('status', 1)
            ->get();
        // return $is_subscribed;
        $is_verified_other = SchoolClaim::where('school_id', $id)
            ->where('verify', 9)
            ->count();
        $is_own_verified_owner = SchoolClaim::where('school_id', $id)
            ->where('verify', 9)
            ->where('claim_id', $user_id)
            ->count();
        return view('school.view.details', compact(
            'schooldetails',
            'schoolcontact',
            'schooleligibility',
            'academics',
            'schoolfees',
            'schoolseats',
            'schoolhours',
            'schoolfeatures',
            'schoolimages',
            'schoolclaims',
            'is_verified',
            'is_subscribed',
            'is_claimed',
            'is_verified_other',
            'is_own_verified_owner',
            'payment_status'
        ));
    }

    public function openinghours()
    {
        return view('school.add.openinghours');
    }
    public function eligibility()
    {
        return view('school.add.eligibility');
    }
    public function seatavailability()
    {
        return view('school.add.seatavailability');
    }
    public function schoolfacilities()
    {
        return view('school.add.facilities');
    }
    public function feesstructure()
    {
        return view('school.add.feesstructure');
    }
    public function academicperformance()
    {
        return view('school.add.academic');
    }
    public function schoolgallery()
    {
        return view('school.add.gallery');
    }
    public function schoolclaim($id)
    {
        return view('school.add.claim', compact('id'));
    }
}
