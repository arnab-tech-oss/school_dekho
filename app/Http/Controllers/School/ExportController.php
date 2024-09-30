<?php

namespace App\Http\Controllers\School;

use App\Models\Lead;
use App\Models\AllLead;
use App\Models\SchoolLead;
use Illuminate\Http\Request;
use App\Exports\LeadExportSchool;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export_leads(Request $request)
    {
        $from = $request->start_date;
        $to = $request->end_date;
        $school_lead_exists = SchoolLead::whereBetween('created_at', [$from, $to])
            ->where('school_id', $request->school_id)
            ->get();
        if (sizeof($school_lead_exists) > 0) {

            $school_id = $request->school_id;
            $leads = SchoolLead::where('school_id', $school_id)->whereBetween('created_at', [$from, $to])->get();
            $output = [];
            foreach ($leads as $lead) {
                $student_lead = Lead::where('id', $lead->lead_id)->select('student_name', 'student_contact1', 'admission_for', 'location', 'remarks')->get();
                if (sizeof($student_lead) > 0) {
                    array_push($output, $student_lead->toArray());
                } else {
                    $all_lead = AllLead::where('id', $lead->lead_id)->select('name', 'phone', 'admission_for', 'location')->get();
                    array_push($output, $all_lead->toArray());
                }
            }
            //return $output;
            return Excel::download(new LeadExportSchool($request), 'all_school_lead.xlsx');
        } else {
            return redirect()->back()->with('message', 'No leads has been generated from this date range');
        }
    }
}
