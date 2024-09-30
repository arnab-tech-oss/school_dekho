<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExportLeadCity;
use App\Exports\ExportLeads;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Lead;
use App\Models\School;
use App\Models\SchoolContact;
use App\Models\SchoolLead;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::latest()->paginate(10);
        $schools = School::with('school_address')->get();
        return view('admin.lead.list', compact('leads', 'schools'));
    }

    public function lead_location()
    {
        $leads = Lead::paginate(5);
        $schools = School::all();
        $cities = SchoolContact::select('city')->distinct()->get();
        return view('admin.lead.location', compact('leads', 'schools', 'cities'));
    }

    public function details($id)
    {
        $school = null;
        $lead = Lead::where('id', $id)->first();
        $school_ids = SchoolLead::where('lead_id',$id)->select('school_id')->get();
        $school_name = [];
        
        foreach($school_ids as $key=>$value)
        {
            $names = School::where('id',$value->school_id)->select('name','id', 'status')->with('contact')->get();
            $school_name = array_merge($school_name, $names->toArray());
        }

        $school_leads = SchoolLead::where('lead_id',$id)->with('school')->get();
       
        if ($lead->admission == 1)
            $school = School::where('id', $lead->admission_school_id)->first();

        return view('admin.lead.details', compact('lead', 'school','school_name', 'school_leads'));
    }
    
    public function lead_admit_school(Request $request)
    {
        Lead::where('id',$request->lead_id)->update(array('admission'=>'1', 'admission_school_id'=>$request->school_id ));
        SchoolLead::where('lead_id', $request->lead_id)->update(array('is_open'=>'0'));
        SchoolLead::where('lead_id', $request->lead_id)->update(array('status'=>'3'));
        SchoolLead::where('lead_id', $request->lead_id)->where('school_id', $request->school_id)->update(array('status'=>'4'));
        return redirect()->back()->with('success','Admission marked successfully');
    }
    
    public function manual()
    {
        return view('admin.lead.manual_form');
    }

    public function add_lead(Request $request)
    {
        $lead = new Lead();

        $lead->student_name = $request->student;
        $lead->student_contact1 = $request->contact_1;
        $lead->student_contact2 = $request->contact_2;
        $lead->admission_for = $request->admission_for;
        $lead->location = $request->location;
        $lead->admission = '0';
        $lead->lead_mode = "manual";

        $lead->save();

        // $schools = School::where('name', 'like', '%'.$request->location.'%')->take(10)->get();
        $schools = DB::table('schools')
            ->select('*')
            ->join('school_contacts', 'schools.id', '=', 'school_contacts.school_id')
            ->where('school_contacts.city', 'like', '%' . $request->location . '%')
            ->orWhere('school_contacts.pincode', 'like', '%' . $request->location . '%')
            ->orWhere('schools.name', 'like', '%' . $request->location . '%')
            ->get();
        foreach ($schools as $school) {
            $school_lead = new SchoolLead();
            $school_lead->lead_id = $lead->id;
            $school_lead->school_id = $school->id;
            $school_lead->is_open = '1';
            $school_lead->save();
        }

        return redirect()->back()->with('success', 'Leads has been added successfully');;
    }
 
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
        $from = $request->start_date;
        $to = $request->end_date;
        $school_ids = SchoolContact::where('city', $request->city)
            ->select('school_id')
            ->get();

        $lead_collection = [];

        foreach ($school_ids as $key => $value) {

            $lead_ids = SchoolLead::where('school_id', $value->school_id)
                ->whereBetween('created_at', [$from, $to])
                ->select('lead_id')
                ->get();

            $lead_collection = array_merge($lead_collection, $lead_ids->toArray());
        }
        
        // return $lead_collection;
        if(sizeof($lead_collection) == 0){
            return redirect()->back()->with('message','No leads has been generated for this date range');
        }
        if (sizeof($school_ids) == 0) {
            return redirect()->back()->with('message', 'No leads has been generated from this city');
        } else {
            return Excel::download(new ExportLeadCity($request), $request->city . '.xlsx');
        }
    }
}
