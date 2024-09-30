<?php

namespace App\Http\Controllers\Lead;

use App\Models\School;
use App\Models\SchoolLead;
use App\Exports\ExportLeads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\AllLead;
use App\Exports\ExportLeadLocation;

class LeadExportController extends Controller
{
    public function export_leads(Request $request)
    {
        $from = $request->start_date;
        $to = $request->end_date;
        $school_lead_exists = SchoolLead::whereBetween('created_at', [$from, $to])
            ->where('school_id', $request->school_id)
            ->get();
        if (sizeof($school_lead_exists) == 0 && $request->school_id == "all_schools") {
            $school_lead_all_exists = SchoolLead::whereBetween('created_at', [$from, $to])->get();
            if (sizeof($school_lead_all_exists)) {
                return Excel::download(new ExportLeads($request), 'all_school_lead.xlsx');
            } else {
                return redirect()->back()->with('message', 'No leads has been generated from this date range');
            }
        } elseif (sizeof($school_lead_exists) == 0 && $request->school_id != "all_schools") {
            return redirect()->back()->with('message', 'No leads has been generated from this school');
        } else {
            $school_name = School::where('id', $request->school_id)->select('name')->get();
            return Excel::download(new ExportLeads($request), $school_name[0]->name . '.xlsx');
        }
    }
    
     public function export_leads_location(Request $request)
    {
        $from = $request->form_date;
        $to = $request->to_date;
        $location = $request->location;
        $lead_exists = AllLead::whereBetween('created_at', [$from, $to])
            ->where('location', $request->location)
            ->where('display',1)
            ->get();
        if (sizeof($lead_exists) > 0) {
            return Excel::download(new ExportLeadLocation($request), $location . ".xlsx");
        } else {
            return redirect()->back()->with('message', 'No leads has been generated from this location');
        }
    }

}
