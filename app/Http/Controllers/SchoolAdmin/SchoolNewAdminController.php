<?php

namespace App\Http\Controllers\SchoolAdmin;

use App\Models\Lead;
use App\Models\School;
use App\Models\Payment;
use App\Models\Support;
use App\Models\SchoolBill;
use App\Models\SchoolLead;
use App\Models\SchoolClaim;
use Illuminate\Http\Request;
use App\Models\SchoolBillOriginal;
use App\Http\Controllers\Controller;
use App\Models\SchoolContact;
use App\Models\SchoolEligibility;
use App\Models\SchoolFacility;
use App\Models\SchoolFees;
use App\Models\SchoolHour;
use App\Models\SchoolImage;
use Illuminate\Support\Facades\Auth;

class SchoolNewAdminController extends Controller
{
    public function index()
    {
        $school_admin_id = Auth::user()->id;
        $payment_schools =  Payment::where('claim_id', $school_admin_id)->get();
        
        $subscription_check = 0;
        $last_date = 0;
        foreach ($payment_schools as $data) {
            if ($data->validated_at < now()) {
                $subscription_check = 1;
                $last_date = $data->validated_at;
                $expiry_date  = $data->validated_at;
                break;
            }
            $expiry_date  = $data->validated_at;
        }
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $claimed_schools_count = SchoolClaim::where('claim_id', $school_admin_id)
            ->where('verify', 0)
            ->count();
        $verified_school_count = SchoolClaim::where('claim_id', $school_admin_id)
            ->where('verify', 9)
            ->count();
      
        $School_claims = SchoolClaim::where('claim_id', $school_admin_id)
            ->where('verify', 9)->pluck('school_id');
        $lead_count = SchoolLead::whereIn('school_id', $School_claims)->count();
      
        $school_id = Payment::where('claim_id', $school_admin_id)->first();
        if ($school_id) {
            $total_admission_count = SchoolLead::where('school_id', $school_id->school_id)->where('status', 4)->count();
           
        }
        //percentage calculation
        $profile_percentage = 0;
        $school_id_for_percentage = $school_id->school_id;
        $school_details = School::where('id', $school_id_for_percentage)->first();
        if ($school_details->name && $school_details->school_logo && $school_details->about && $school_details->school_type && $school_details->school_medium_id && $school_details->board) {
            $profile_percentage = $profile_percentage + 12.5;
        }
        if ($school_details->principal_name && $school_details->principal_pic) {
            $profile_percentage = $profile_percentage + 12.5;
        }
        $school_facilitys = SchoolFacility::where('school_id', $school_id_for_percentage)->first();
        if ($school_facilitys->education && $school_facilitys->classroom && $school_facilitys->lab && $school_facilitys->boarding && $school_facilitys->sports && $school_facilitys->arts && $school_facilitys->digital && $school_facilitys->food && $school_facilitys->security && $school_facilitys->medical && $school_facilitys->infra) {
            $profile_percentage = $profile_percentage + 12.5;
        }
        $school_opening_hours = SchoolHour::where('school_id', $school_id_for_percentage)->first();
        if ($school_opening_hours->sun && $school_opening_hours->mon && $school_opening_hours->tue && $school_opening_hours->wed && $school_opening_hours->thu && $school_opening_hours->fri && $school_opening_hours->sat) {
            $profile_percentage = $profile_percentage + 12.5;
        }
        $school_contact_infos = SchoolContact::where('school_id', $school_id_for_percentage)->first();
        if ($school_contact_infos->address && $school_contact_infos->contact && $school_contact_infos->email && $school_contact_infos->city && $school_contact_infos->district_id && $school_contact_infos->state_id && $school_contact_infos->pincode) {
            $profile_percentage = $profile_percentage + 12.5;
        }
        $school_eligibilities = SchoolEligibility::where('school_id', $school_id_for_percentage)->first();
        if ($school_eligibilities->pre_nursery && $school_eligibilities->nursery && $school_eligibilities->lkg && $school_eligibilities->ukg && $school_eligibilities->kg && $school_eligibilities->class_one && $school_eligibilities->class_two && $school_eligibilities->class_three && $school_eligibilities->class_four && $school_eligibilities->class_five && $school_eligibilities->class_six && $school_eligibilities->class_seven && $school_eligibilities->class_eight && $school_eligibilities->class_ten && $school_eligibilities->class_twelve && $school_eligibilities->class_eleven) {
            $profile_percentage = $profile_percentage + 12.5;
        }
        $school_fees = SchoolFees::where('school_id', $school_id_for_percentage)->first();
        $pre_nursery_fees = explode(',', $school_fees->pre_nursery);
        $nursery_fees = explode(',', $school_fees->nursery);
        $lkg_fees = explode(',', $school_fees->lkg);
        $ukg_fees = explode(',', $school_fees->ukg);
        $kg_fees = explode(',', $school_fees->kg);
        $class_one_fees = explode(',', $school_fees->class_one);
        $class_two_fees = explode(',', $school_fees->class_two);
        $class_three_fees = explode(',', $school_fees->class_three);
        $class_four_fees = explode(',', $school_fees->class_four);
        $class_five_fees = explode(',', $school_fees->class_five);
        $class_six_fees = explode(',', $school_fees->class_six);
        $class_seven_fees = explode(',', $school_fees->class_seven);
        $class_eight_fees = explode(',', $school_fees->class_eight);
        $class_nine_fees = explode(',', $school_fees->class_nine);
        $class_ten_fees = explode(',', $school_fees->class_ten);
        $class_eleven_fees = explode(',', $school_fees->class_eleven);
        $class_twelve_fees = explode(',', $school_fees->class_twelve);
        if (!in_array("0", $pre_nursery_fees) && !in_array("0", $nursery_fees) && !in_array("0", $lkg_fees) && !in_array("0", $ukg_fees) && !in_array("0", $kg_fees) && !in_array("0", $class_one_fees) && !in_array("0", $class_two_fees) && !in_array("0", $class_three_fees) && !in_array("0", $class_five_fees) && !in_array("0", $class_six_fees) && !in_array("0", $class_seven_fees) && !in_array("0", $class_eight_fees) && !in_array("0", $class_nine_fees) && !in_array("0", $class_ten_fees) && !in_array("0", $class_eleven_fees) && !in_array("0", $class_twelve_fees)) {
            $profile_percentage = $profile_percentage + 12.5;
        }
        $school_images = SchoolImage::where('school_id', $school_id_for_percentage)->first();
        if (sizeof($school_images->school_image) > 4) {
            $profile_percentage = $profile_percentage + 12.5;
        }
        return view('school_admin_new.dashboard', compact('claimed_schools_count', 'payment_schools', 'expiry_date', 'school_details', 'profile_percentage', 'verified_school_count', 'lead_count', 'total_admission_count', 'total_schools', 'subscription_check', 'last_date'));
    }
    public function allschoollist()
    {
        $schools = School::all();
        return $schools;
    }
    public function myschools()
    {
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $school_admin_id = Auth::user()->id;
        $payment_schools =  Payment::where('claim_id', $school_admin_id)->get();
        $subscription_check = 0;
        $last_date = 0;
        foreach ($payment_schools as $data) {
            if ($data->validated_at < now()) {
                $subscription_check = 1;
                $last_date = $data->validated_at;
                break;
            }
        }
        return view('school_admin_new.myschool', compact('total_schools', 'subscription_check', 'last_date'));
    }
    public function notifications()
    {
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $school_admin_id = Auth::user()->id;
        $payment_schools =  Payment::where('claim_id', $school_admin_id)->get();
        $subscription_check = 0;
        $last_date = 0;
        foreach ($payment_schools as $data) {
            if ($data->validated_at < now()) {
                $subscription_check = 1;
                $last_date = $data->validated_at;
                break;
            }
        }
        return view('school_admin_new.notification', compact('total_schools', 'subscription_check', 'last_date'));
    }
    public function support()
    {
        $school_admin_id = Auth::user()->id;
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $payment_schools =  Payment::where('claim_id', $school_admin_id)->get();
        $subscription_check = 0;
        $last_date = 0;
        foreach ($payment_schools as $data) {
            if ($data->validated_at < now()) {
                $subscription_check = 1;
                $last_date = $data->validated_at;
                break;
            }
        }
        return view('school_admin_new.support', compact('total_schools', 'subscription_check', 'last_date'));
    }
    public function faq()
    {
        $school_admin_id = Auth::user()->id;
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $payment_schools =  Payment::where('claim_id', $school_admin_id)->get();
        $subscription_check = 0;
        $last_date = 0;
        foreach ($payment_schools as $data) {
            if ($data->validated_at < now()) {
                $subscription_check = 1;
                $last_date = $data->validated_at;
                break;
            }
        }
        return view('school_admin_new.commonquery', compact('total_schools', 'subscription_check', 'last_date'));
    }
    public function priority_support()
    {
        $school_admin_id = Auth::user()->id;
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $payment_schools =  Payment::where('claim_id', $school_admin_id)->get();
        $subscription_check = 0;
        $last_date = 0;
        foreach ($payment_schools as $data) {
            if ($data->validated_at < now()) {
                $subscription_check = 1;
                $last_date = $data->validated_at;
                break;
            }
        }
        return view('school_admin_new.prioritysupport', compact('total_schools', 'subscription_check', 'last_date'));
    }
    public function ticket_history()
    {
        $school_admin_id = Auth::user()->id;
        $user_id = Auth::user()->id;
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $tickets = Support::where('user_id', $user_id)->get();
        $payment_schools =  Payment::where('claim_id', $school_admin_id)->get();
        $subscription_check = 0;
        $last_date = 0;
        foreach ($payment_schools as $data) {
            if ($data->validated_at < now()) {
                $subscription_check = 1;
                $last_date = $data->validated_at;
                break;
            }
        }
        return view('school_admin_new.ticket_history', compact('tickets', 'total_schools', 'subscription_check', 'last_date'));
    }
    public function all_leads()
    {
        $school_admin_id = Auth::user()->id;
        $payment_schools =  Payment::where('claim_id', $school_admin_id)->get();
        $subscription_check = 0;
        $last_date = 0;
        foreach ($payment_schools as $data) {
            if ($data->validated_at < now()) {
                $subscription_check = 1;
                $last_date = $data->validated_at;
                break;
            }
        }
        return view('school_admin_new.all_leads', 'subscription_check', 'last_date');
    }
    public function lead_export()
    {
        $school_admin_id = Auth::user()->id;
        $payment_status = Payment::with('claim')
            ->where('status', 1)
            ->where('validated_at', '>=', date('Y-m-d H:i:s', time()))
            ->where('claim_id', auth()->user()->id)
            ->get();
        $payment_schools =  Payment::where('claim_id', $school_admin_id)->get();
        $subscription_check = 0;
        $last_date = 0;
        foreach ($payment_schools as $data) {
            if ($data->validated_at < now()) {
                $subscription_check = 1;
                $last_date = $data->validated_at;
                break;
            }
        }
        return view('school_admin_new.lead_export', compact('payment_status', 'subscription_check', 'last_date'));
    }
    public function subscription()
    {
        $id = Auth::user()->id;
        $school_admin_id = Auth::user()->id;
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
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
        $schoollist = $schoollist->whereNotNull('expiry_date',);
        $payment_schools =  Payment::where('claim_id', $school_admin_id)->get();
        $subscription_check = 0;
        $last_date = 0;
        foreach ($payment_schools as $data) {
            if ($data->validated_at < now()) {
                $subscription_check = 1;
                $last_date = $data->validated_at;
                break;
            }
        }
        // return $schoollist;
        return view('school_admin_new.subscription', compact('schoollist', 'total_schools', 'subscription_check', 'last_date'));
    }
    public function payment_history()
    {
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $school_admin_id = Auth::user()->id;
        $user_id = Auth::user()->id;
        $schoollist = SchoolClaim::where('claim_id', $user_id)->where('verify', 9)->select('school_id')->get();
        $school_bills = [];
        foreach ($schoollist as $school) {
            $bill = SchoolBillOriginal::with('school')->where('school_id', $school->school_id)->get();
            array_push($school_bills, $bill);
        }
        //  return $school_bills;
        $payment_schools =  Payment::where('claim_id', $school_admin_id)->get();
        $subscription_check = 0;
        $last_date = 0;
        foreach ($payment_schools as $data) {
            if ($data->validated_at < now()) {
                $subscription_check = 1;
                $last_date = $data->validated_at;
                break;
            }
        }
        return view('school_admin_new.payment_history', compact('school_bills', 'total_schools', 'subscription_check', 'last_date'));
    }
    public function payment_receipt($id)
    {
        $payment_schools =  Payment::where('claim_id', $id)->get();
        $school_admin_id = Auth::user()->id;
        $subscription_check = 0;
        $last_date = 0;
        foreach ($payment_schools as $data) {
            if ($data->validated_at < now()) {
                $subscription_check = 1;
                $last_date = $data->validated_at;
                break;
            }
        }
        $bill_details = SchoolBillOriginal::with('school')->where('id', $id)->first();
        $bill_id      = "0000" . $bill_details->id;
        $bill_id      = substr($bill_id, -12);
        $data = [
            'title' => 'Welcome to SchoolDekho.org',
            'date' => date('m/d/Y'),
            'bill' => $bill_details,
            'gst'  => $bill_details->fee_amount,
            'bill_id' => $bill_id,
        ];
        if ($bill_details->bill_type == "Proforma") {
            return view('account.bill.officeproformapdf', $data, compact('subscription_check', 'last_date'));
        }
        //$pdf = PDF::loadView('account.bill.officepdf', $data);
        elseif ($bill_details->status == 1) {
            return view('account.bill.officepdf', $data, compact('subscription_check', 'last_date'));
        } else {
            return view('account.bill.officecancelpdf', $data, compact('subscription_check', 'last_date'));
        }
        //return $pdf->download('OfficeCopy.pdf');
    }
    public function subscription_benefit()
    {
        $school_admin_id = Auth::user()->id;
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $payment_schools =  Payment::where('claim_id', $school_admin_id)->get();
        $subscription_check = 0;
        $last_date = 0;
        foreach ($payment_schools as $data) {
            if ($data->validated_at < now()) {
                $subscription_check = 1;
                $last_date = $data->validated_at;
                break;
            }
        }
        return view('school_admin_new.subscription_benefit', compact('total_schools', 'subscription_check', 'last_date'));
    }
    public function checkout($schoolid)
    {
        $school_admin_id = Auth::user()->id;
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $payment_schools =  Payment::where('claim_id', $school_admin_id)->get();
        $subscription_check = 0;
        $last_date = 0;
        foreach ($payment_schools as $data) {
            if ($data->validated_at < now()) {
                $subscription_check = 1; 
                $last_date = $data->validated_at;
                break;
            }
        }
        $school_details = School::with('school_address')->where('id', $schoolid)->first();
        return view('school_admin_new.checkout', compact('total_schools', 'subscription_check', 'last_date','school_details'));
    }
    public function manage_user()
    {
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $school_admin_id = Auth::user()->id;
        $payment_schools =  Payment::where('claim_id', $school_admin_id)->get();
        $subscription_check = 0;
        $last_date = 0;
        foreach ($payment_schools as $data) {
            if ($data->validated_at < now()) {
                $subscription_check = 1;
                $last_date = $data->validated_at;
                break;
            }
        }
        return view('school_admin_new.manage_user', compact('total_schools', 'subscription_check', 'last_date'));
    }
}
