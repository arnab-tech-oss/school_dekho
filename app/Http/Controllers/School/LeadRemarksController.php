<?php

namespace App\Http\Controllers\School;
use App\Models\Lead;
use App\Http\Controllers\Controller;
use App\Models\SchoolLeadRemark;
use Illuminate\Http\Request;

class LeadRemarksController extends Controller
{
    public function submit_remarks(Request $request)
    {
       if ($request->status == 5) {
            $lead_details = Lead::where('id', $request->lead_id)->first();
            $lead_details->admission = 1;
            $lead_details->update($lead_details->toArray());
            return redirect()->back();
        }
        $entity = new SchoolLeadRemark();
        $entity->lead_id = $request->lead_id;
        $entity->school_id = $request->school_id;
        $entity->remarks = $request->remarks;
        $entity->status = $request->status;
        $entity->save();
        return redirect()->back();
    }
}
