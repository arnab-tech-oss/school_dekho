<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExportLeadLocationWise;
use App\Exports\ExportLeadSchoolWise;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\School;
use App\Models\SchoolContact;
use App\Models\SchoolLead;
use App\Models\State;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export_school_wise()
    { 
        $schools = School::with('school_address')->get();
        return view('admin.export.schoollead', compact('schools'));
    }

    public function export_lead_school_wise(Request $request)
    {
        $from = $request->start_date;
        $to = $request->end_date;
        $school_id = $request->school_id;
        $lead_collection = [];
        if ($school_id == "all_schools") {
            $school_lead_exists = SchoolLead::whereBetween('created_at', [$from, $to])->get();
        } else {
            $school_lead_exists = SchoolLead::whereBetween('created_at', [$from, $to])
                ->where('school_id', $school_id)
                ->get();
        }
        if (sizeof($school_lead_exists) > 0) {
            return Excel::download(new ExportLeadSchoolWise($request), 'school_wise_lead.xlsx');
        } else {
            return redirect()->back()->with('message', 'No leads has been transfered from this date range');
        }
    }

    public function export_location_wise()
    {
        $all_states = State::all();

        return view('admin.export.locationlead', compact('all_states'));
    }

    public function export_lead_location_wise(Request $request)
    {
        $from = $request->start_date;
        $to = $request->end_date;
        $state_id = $request->state_id;
        $district_id = $request->district_id;
        $lead_collection = [];
        $all_school_ids = SchoolContact::where('state_id', $state_id)->where('district_id', $district_id)->pluck('school_id');
        foreach ($all_school_ids as $school_id) {
            $all_lead_id = SchoolLead::where('school_id', $school_id)->whereBetween('created_at', [$from, $to])->pluck('all_lead_id');
            array_push($lead_collection, $all_lead_id);
        }
        if (sizeof($lead_collection) > 0) {
            return Excel::download(new ExportLeadLocationWise($request), 'location_wise_lead.xlsx');
        } else {
            return redirect()->back()->with('message', 'No leads has been transfered from this date range');
        }
    }
}
