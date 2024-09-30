<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExportAutoLeadLocationWise;
use App\Exports\ExportAutoLeadSchoolWise;
use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\SchoolContact;
use App\Models\SchoolNewApplication;
use App\Models\State;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SchoolAutoLeadExportController extends Controller
{
    public function school_auto_lead_export()
    {
        $schools = School::with('school_address')->get();
        return view('admin.export.schoolautolead', compact('schools'));
    }

    public function school_auto_lead_export_submit(Request $request)
    {
        $school_id = $request->school_id;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $school_collection = [];
        if ($school_id == "all_schools") {
            $total_lead_count = SchoolNewApplication::whereBetween('created_at', [$start_date, $end_date])->count();
        } else {
            $total_lead_count = SchoolNewApplication::whereBetween('created_at', [$start_date, $end_date])
                ->where('school_id', $school_id)->count();
        }
        if ($total_lead_count == 0) {
            return redirect()->back()->with('message', 'No leads has been transfered from this date range');
        } else {
            return Excel::download(new ExportAutoLeadSchoolWise($request), 'school_wise_lead.xlsx');
        }
    }

    public function location_wise_auto_lead_export()
    {
        $all_states = State::all();
        return view('admin.export.locationautolead', compact('all_states'));
    }

    public function location_wise_auto_lead_export_submit(Request $request)
    {
        $from = $request->start_date;
        $to = $request->end_date;
        $state_id = $request->state_id;
        $district_id = $request->district_id;
        $all_school_ids = SchoolContact::where('state_id', $state_id)->where('district_id', $district_id)->pluck('school_id');
        $lead_collection = [];
        foreach ($all_school_ids as $school_id) {
            $leads_against_school = SchoolNewApplication::whereBetween('created_at', [$from, $to])
                ->where('school_id', $school_id)->get();
            foreach ($leads_against_school as $lead) {
                array_push($lead_collection, $lead);
            }
        }
        if (sizeof($lead_collection) == 0) {
            return redirect()->back()->with('message', 'No leads has been transfered from this date range');
        } else {
            return Excel::download(new ExportAutoLeadLocationWise($request), 'location_wise_lead.xlsx');
        }
    }
}
