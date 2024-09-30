<?php
namespace App\Http\Controllers\SchoolAdmin;

use App\Exports\LeadExportSchool;
use App\Http\Controllers\Controller;
use App\Models\AllLead;
use App\Models\Lead;
use App\Models\Payment;
use App\Models\School;
use App\Models\SchoolClaim;
use App\Models\SchoolLead;
use App\Models\SchoolLeadRemark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SchoolLeadController extends Controller
{
    public function index()
    {
        $school_claims = SchoolClaim::where('claim_id', auth()->user()->id)->where('verify', 9)->get();
        $schools = [];
        $school_ids = [];
        foreach ($school_claims as $school_claim) {
            $school = School::where('id', $school_claim->school->id)->get();
            array_push($schools, $school);
            array_push($school_ids, $school_claim->school->id);
        }
        $new_lead_count = SchoolLead::whereIn('school_id', $school_ids)->where('status', 0)->count();
        $school_leads = SchoolLead::with('lead')->whereIn('school_id', $school_ids)->orderByDesc('created_at')->get()->values()->toArray();
        $leads = [];
        foreach ($school_leads as $lead) {
            $remarks = SchoolLeadRemark::where('school_id', $lead['school_id'])->where('lead_id', $lead['lead_id'])->latest()->get()->values()->toArray();
            $lead['remarks'] = $remarks;
            array_push($leads, $lead);
        }
        $payment_status = Payment::with('claim')
            ->where('status', 1)
            ->where('validated_at', '>=', date('Y-m-d H:i:s', time()))
            ->where('claim_id', auth()->user()->id)
            ->get();
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        
        return view('school_admin.leads.index', compact('leads', 'payment_status', 'school_claims', 'schools', 'new_lead_count', 'total_schools'));
    }
    public function lead_by_school(Request $request)
    {
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $school_claims = SchoolClaim::where('claim_id', auth()->user()->id)->where('verify', 9)->get();
        $schools = [];
        $school_ids = [];
        foreach ($school_claims as $school_claim) {
            $school = School::where('id', $school_claim->school->id)->get();
            array_push($schools, $school);
            array_push($school_ids, $school_claim->school->id);
        }
        $new_lead_count = SchoolLead::whereIn('school_id', $school_ids)->where('status', 0)->count();
        if ($request->lead_type == 9) {
            $school_leads = SchoolLead::with('lead')->where('school_id', $request->school_id)->get()->values()->toArray();
        } else {
            $school_leads = SchoolLead::with('lead')->where('status', $request->lead_type)->where('school_id', $request->school_id)->get()->values()->toArray();
        }

        $leads = [];
        foreach ($school_leads as $lead) {
            $remarks = SchoolLeadRemark::where('school_id', $lead['school_id'])->where('lead_id', $lead['lead_id'])->latest()->get()->values()->toArray();
            $lead['remarks'] = $remarks;
            array_push($leads, $lead);
        }
        $payment_status = Payment::with('claim')
            ->where('status', 1)
            ->where('validated_at', '>=', date('Y-m-d H:i:s', time()))
            ->where('claim_id', auth()->user()->id)
            ->get();
        return view('school_admin.leads.index', compact('leads', 'payment_status', 'school_claims', 'schools', 'new_lead_count', 'total_schools'));
    }
    public function details($id, $school_id)
    {
        $payment = Payment::where('status', 1)
            ->where('validated_at', '>=', date('Y-m-d H:i:s', time()))
            ->where('claim_id', $school_id)
            ->count();
        $school = null;
        $lead = Lead::where('id', $id)->first();
        $lead_school = SchoolLead::select('status')->where('lead_id', $id)->where('school_id', $school_id)->first();
        if ($lead->admission == 1) {
            $school = School::where('id', $lead->admission_school_id)->first();
        }

        // $lead_for_school = School::where('id', $school_id)->first();
        $schoolLead = SchoolLead::where('lead_id', $id)->where('school_id', $school_id)->first();
        $lead_remarks_list = SchoolLeadRemark::where('school_id', $school_id)->where('lead_id', $id)->orderBy('id', 'desc')->get();
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        return view('school_admin.leads.details', compact('lead', 'school', 'school_id', 'lead_school', 'schoolLead', 'lead_remarks_list', 'school_id', 'total_schools'));
    }
    public function show_export_leads()
    {
        $school_claims = SchoolClaim::where('claim_id', auth()->user()->id)->where('verify', 9)->get();
        $school_ids = [];
        foreach ($school_claims as $school_claim) {
            array_push($school_ids, $school_claim->school->id);
        }
        $new_lead_count = SchoolLead::whereIn('school_id', $school_ids)->where('status', 0)->count();
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $payment_status = Payment::with('claim')
            ->where('status', 1)
            ->where('validated_at', '>=', date('Y-m-d H:i:s', time()))
            ->where('claim_id', auth()->user()->id)
            ->get();
        return view('school_admin.leads.export', compact('school_claims', 'new_lead_count', 'total_schools', 'payment_status'));
    }
    public function export_leads(Request $request)
    {
        if ($request->agree) {
            $from = $request->start_date;
            $to = $request->end_date;
            $school_lead_exists = SchoolLead::whereBetween('created_at', [$from, $to])
                ->where('school_id', $request->school_id)
                ->get();
            if (sizeof($school_lead_exists) > 0) {
                $school_id = $request->school_id;
                // $leads = SchoolLead::where('school_id', $school_id)->whereBetween('created_at', [$from, $to])->get();
                if ($request->lead_type == 9) {
                    $leads = SchoolLead::where('school_id', $school_id)->whereBetween('created_at', [$from, $to])->get();
                } else {
                    $leads = SchoolLead::where('status', $request->lead_type)->where('school_id', $school_id)->whereBetween('created_at', [$from, $to])->get();
                }

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
                return Excel::download(new LeadExportSchool($request), 'school_leads.xlsx');
            } else {
                return redirect()->back()->with('message', 'No leads found within specified date range. Please! consider date range and export.');
            }
        } else {
            return redirect()->back()->with('message', 'Accept our terms and condition before continue.');
        }
    }
    public function submit_remarks(Request $request)
    {
        //  return $request->all();
        if ($request->status == 4) {
            $lead_details = Lead::where('id', $request->lead_id)->first();
            $lead_details->admission = 1;
            $lead_details->update($lead_details->toArray());
            $entity = new SchoolLeadRemark();
            $entity->lead_id = $request->lead_id;
            $entity->school_id = $request->school_id;
            $entity->remarks = $request->remarks;
            $entity->status = $request->status;
            $entity->save();
            $school_lead_details = SchoolLead::where('school_id', $request->school_id)->where('lead_id', $request->lead_id)->first();
            $school_lead_details->status = $request->status;
            $school_lead_details->update($school_lead_details->toArray());
            return redirect()->back()->with('message', "Remarks added");
        }
        $entity = new SchoolLeadRemark();
        $entity->lead_id = $request->lead_id;
        $entity->school_id = $request->school_id;
        $entity->remarks = $request->remarks;
        $entity->status = $request->status;
        $entity->save();
        $school_lead_details = SchoolLead::where('school_id', $request->school_id)->where('lead_id', $request->lead_id)->first();
        $school_lead_details->status = $request->status;
        $school_lead_details->update($school_lead_details->toArray());
        $lead_details = Lead::where('id', $request->lead_id)->first();
        $lead_details->admission = 10;
        $lead_details->update($lead_details->toArray());
        return redirect()->back()->with('message', "Remarks added");
    }
}