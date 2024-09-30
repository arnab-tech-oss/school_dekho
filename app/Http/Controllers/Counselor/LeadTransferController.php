<?php

namespace App\Http\Controllers\Counselor;

use App\Models\Lead;
use App\Models\School;
use App\Models\AllLead;
use App\Models\SchoolLead;
use Illuminate\Http\Request;
use App\Models\SchoolContact;
use App\Core\ColectionPaginate;
use App\Mail\SchoolLeadTransfer;
use App\Http\Controllers\Controller;
use App\Jobs\SendEmailMouSchoolJob;
use Illuminate\Support\Facades\Mail;
use App\Mail\SchoolLeadTransferNonMou;

class LeadTransferController extends Controller
{
    public function search_result(Request $request)
    {
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $location = $request->location;
        $lead_id  = $request->lead_id;
        // return $request->all();
        $schools = School::with('address', 'reviews', 'medium', 'claims')
            ->where('status', '1')
            ->where('affiliated', '1')
            ->whereHas('address', function ($query) use ($latitude, $longitude) {
                $query->whereBetween('lattitude', [$latitude - 0.1, $latitude + 0.1]);
                $query->whereBetween('longitude', [$longitude - 0.1, $longitude + 0.1]);
            })->get();
        foreach ($schools as  $school) {
            $dist = $this->getDistance($latitude, $longitude, (float) $school->address->lattitude, (float) $school->address->longitude) / 1000;
            $school->distance = number_format($dist, 3);
        }
        // return $schools->get();
        $collect = collect($schools)->sortBy('distance');
        // $all_schools = ColectionPaginate::paginate($collect, 10);
        // return $collect;
        return view('counselor.lead.schoollist', compact('collect', 'lead_id'));
        // return redirect()->back()->with('latitudeitude', $latitude);
    }
    function getDistance(
        $latitudeitudeFrom,
        $longitudeitudeFrom,
        $latitudeitudeTo,
        $longitudeitudeTo,
        $earthRadius = 6371000
    ) {
        $latitudeFrom = deg2rad($latitudeitudeFrom);
        $lonFrom = deg2rad($longitudeitudeFrom);
        $latitudeTo = deg2rad($latitudeitudeTo);
        $lonTo = deg2rad($longitudeitudeTo);
        $latitudeDelta = $latitudeTo - $latitudeFrom;
        $lonDelta = $lonTo - $lonFrom;
        $angle = 2 * asin(sqrt(pow(sin($latitudeDelta / 2), 2) +
            cos($latitudeFrom) * cos($latitudeTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
    }
    public function lead_transfer(Request $request)
    {
        $schools = $request->school_ids;
        // return $schools;
        $lead_id = $request->lead_id;
        // return $request->all();
        // return $schools;
        foreach ($schools as $school) {
            $exist = SchoolLead::where('lead_id', $lead_id)->where('school_id', $school)->exists();
            if (!$exist) {
                $school_lead = new SchoolLead();
                $school_lead->all_lead_id = $lead_id;
                $school_lead->lead_id = $lead_id;
                $school_lead->school_id = $school;
                $school_lead->is_open = '1';
                $school_lead->counselor_id = auth()->user()->id;
                $school_lead->save();
                $lead_details = AllLead::where('id', $lead_id)->where('display',1)->first();
                $student_lead = new Lead();
                $student_lead->school_id = $school;
                $student_lead->student_name = $lead_details->name;
                $student_lead->student_contact1 = $lead_details->phone;
                $student_lead->admission_for = $lead_details->admission_for;
                $student_lead->location = $lead_details->location;
                $student_lead->lead_mode = "manual";
                $student_lead->remarks = $lead_details->remarks_school;
                $student_lead->academic_year = $lead_details->academic_year;
                $student_lead->save();
                $school_lead_details = SchoolLead::where('lead_id', $lead_id)->where('school_id', $school)->first();
                $school_lead_details->lead_id = $student_lead->id;
                $school_lead_details->update($school_lead_details->toArray());
                $is_mou = School::where('id', $school)->first();
                if ($is_mou->is_mou) {
                    $school_mail_id = SchoolContact::where('school_id', $school)->where('is_subscribe', 1)->first();
                    $mouJob = new SendEmailMouSchoolJob($school_mail_id);
                    // Mail::to($school_mail_id->email)->send(new SchoolLeadTransfer($school));
                } else {
                    $school_mail_id = SchoolContact::where('school_id', $school)->where('is_subscribe', 1)->first();
                    Mail::to($school_mail_id->email)->send(new SchoolLeadTransferNonMou($school));
                }
            }
        }
        return response()->json(['is_success' => true, 'message' => "Lead Transfer Successfully"]);
    }
}
