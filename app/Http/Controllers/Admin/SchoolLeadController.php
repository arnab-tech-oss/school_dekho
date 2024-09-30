<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lead;
use App\Models\School;
use App\Models\Payment;
use App\Models\SchoolLead;
use App\Models\SchoolClaim;
use Illuminate\Http\Request;
use App\Models\SchoolLeadRemark;
use App\Models\AllLead;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SchoolLeadController extends Controller
{
    public function index()
    {
        $school_admin_id=Auth::user()->id;
        $School_claims=SchoolClaim::where('claim_id',$school_admin_id)
                                ->where('verify',9)->get();
        $all_leads=SchoolLead::with('lead')->orderBy('created_at','desc')->get();
        // return $lead_count = $all_leads->count();
        $leads=[];
        foreach($School_claims as $data)
        {
            $lead_items=$all_leads->where('school_id',$data->school_id)->values()->toArray();
            // dd($lead_items);
            $leads=array_merge($leads,$lead_items);
        }
        $total_lead_count=sizeof($leads);
        $leads=(object)$leads;
        
        $payment_status = Payment::with('claim')
                            ->where('status',1)
                            ->where('validated_at','>=', date('Y-m-d H:i:s', time()))
                            ->where('claim_id',$school_admin_id)
                            ->get();
        // dd($School_claims);
        return view('school.lead.list',compact('leads', 'payment_status','School_claims','total_lead_count'));
    }

    public function details($id, $school_id)
    {
        $payment = Payment::where('status',1)
                            ->where('validated_at','>=', date('Y-m-d H:i:s', time()))
                            ->where('claim_id',$school_id)
                            ->count();
        // if(!($payment > 0))
        //     return redirect()->back();

        $school = null;
        $lead = Lead::where('id',$id)->first();
        if($lead->admission == 1)
            $school = School::where('id', $lead->admission_school_id)->first();
        $lead_for_school = School::where('id', $school_id)->first();
        $schoolLead = SchoolLead::where('lead_id', $id)->where('school_id', $school_id)->first();
        $all_lead_details = AllLead::where('id',$schoolLead->all_lead_id)->first();
        $lead_remarks_list = SchoolLeadRemark::where('school_id', $school_id)->where('lead_id', $id)->get();
        return view('school.lead.details', compact('lead', 'school','school_id','all_lead_details', 'lead_for_school', 'schoolLead','lead_remarks_list'));
    }

    public function admission($id, $school_id, $status)
    {
        if($status == 3){
            Lead::where('id',$id)->update(array('admission'=>'1', 'admission_school_id'=>$school_id ));
            SchoolLead::where('lead_id', $id)->update(array('is_open'=>'0'));
            SchoolLead::where('lead_id', $id)->update(array('status'=>'3'));
            SchoolLead::where('lead_id', $id)->where('school_id', $school_id)->update(array('status'=>'4'));
            return redirect()->back()->with('success','Admission marked successfully');
        }else{
            SchoolLead::where('lead_id', $id)->where('school_id', $school_id)->update(array('status'=>$status));
            return redirect()->back()->with('success','Lead status updated successfully !');
        }
    }
}
