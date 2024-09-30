<?php

namespace App\Http\Controllers\Counselor;

use App\Http\Controllers\Controller;
use App\Models\CounselorLead;
use App\Models\Lead;
use App\Models\SchoolLead;
use Illuminate\Http\Request;

class CounselorAdmissionController extends Controller
{
    public function admission_leads()
    {
        $counselor_id = auth()->user()->id;
        $transfer_leads = SchoolLead::where('counselor_id', $counselor_id)->get();
        $admitted_leads = [];
        foreach ($transfer_leads as $lead) {
            $admission = Lead::with('admitted_school', 'school_leads')->where('id', $lead->lead_id)->where('admission', 1)->first();
            if (isset($admission)) {
                array_push($admitted_leads, $admission);
            }
        }
        return view('counselor.lead.admission', compact('admitted_leads'));
        // return $admitted_leads;
    }
}
