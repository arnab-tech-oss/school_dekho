<?php
namespace App\Http\Controllers\Lead;

use App\Exports\SchoolApplication;
use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\SchoolApplicatrionForm;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SchoolApplicationController extends Controller
{
    public function school_applications()
    {
        $school_application_leads = SchoolApplicatrionForm::with('school.school_address')->orderBy('id', 'desc')->paginate(50);
        // return $school_application_leads;
        $all_schools = School::with('school_address')->where('status', 1)->get();
        return view('lead.leads.application', compact('school_application_leads', 'all_schools'));
    }
    public function application_details($id)
    {
        $school_application_details = SchoolApplicatrionForm::with('school')->where('id', $id)->first();
        return view('lead.leads.applicationdetails', compact('school_application_details'));
    }
    public function application_export(Request $request)
    {
        $from = $request->start_date;
        $to = $request->end_date;
        $school_id = $request->school_id;  
        $school_application_exists = SchoolApplicatrionForm::with('school.school_address.states')->with('school.school_address.districts')->whereBetween('created_at', [$from, $to])->where('school_id', $school_id)->get();
        if ($school_id == "all") {
            $school_application_exists = SchoolApplicatrionForm::with('school.school_address.states')->with('school.school_address.districts')->whereBetween('created_at', [$from, $to])->get();
        }
        if (sizeof($school_application_exists) == 0) {
            return redirect()->back()->with('message', 'No leads has been generated from this date range');
        } else {
            return Excel::download(new SchoolApplication($request), 'application_lead.xlsx');
        }
    }
}
