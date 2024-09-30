<?php

namespace App\Http\Controllers\Lead;

use App\Models\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolLeadController extends Controller
{
    public function school_lead_list(Request $request)
    {
        if ($request->mou_school == "non_mou") {
            $school_wise_leads = School::with('school_address', 'school_leads')->paginate(10);
            return view('lead.leads.schoollead', compact('school_wise_leads'));
        } elseif ($request->mou_school == "mou") {
            $school_wise_leads = School::with('school_address', 'school_leads')->where('is_mou', 1)->paginate(10);
            return view('lead.leads.schoollead', compact('school_wise_leads'));
        }

        $school_wise_leads = School::with('school_address', 'school_leads')->paginate(10);
        return view('lead.leads.schoollead', compact('school_wise_leads'));
    }
}
