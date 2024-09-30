<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SchoolDetailsPageLeadExport;
use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\SchoolPageLead;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SchoolLeadPageAdminController extends Controller
{
    public function lead_list()
    {
        $all_school_details_page_leads = SchoolPageLead::with('school.school_address')->latest()->paginate(10);
        $all_schools = School::with('school_address')->where('status', 1)->get();
        return view('admin.lead.schooldetailspageleads', compact('all_school_details_page_leads','all_schools'));
    }

    public function details_page_lead_export(Request $request)
    {
        $from = $request->start_date;
        $to = $request->end_date;
        $school_id = $request->school_id; 
        $lead_exists = SchoolPageLead::with('school.school_address')->whereBetween('created_at', [$from, $to])->where('school_id', $school_id)->get();
        if ($school_id == "all") {
            $lead_exists = SchoolPageLead::with('school.school_address')->whereBetween('created_at', [$from, $to])->get();
        }
        if (sizeof($lead_exists) == 0) {
            return redirect()->back()->with('message', 'No leads has been generated from this date range');
        } else {
            return Excel::download(new SchoolDetailsPageLeadExport($request), 'lead.xlsx');
        }
    }
}
