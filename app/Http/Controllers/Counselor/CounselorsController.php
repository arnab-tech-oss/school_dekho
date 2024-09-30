<?php

namespace App\Http\Controllers\Counselor;

use App\Models\User;
use App\Models\AllLead;
use Hamcrest\Core\AllOf;
use App\Models\SchoolLead;
use App\Service\OTPService;
use Illuminate\Support\Str;
use App\Core\BaseController;
use App\Models\LeadFollowup;
use Illuminate\Http\Request;
use App\Models\CounselorLead;
use App\Models\CouselorLogin;
use App\Models\CounselorMobile;
use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\School;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CounselorsController extends BaseController
{
    
    public function login()
    {
        return view('counselor.otplogin');
    }

    public function send_otp(Request $request)
    {
        $response = ['is_success' => false, 'message' => ""];
        $validation = Validator::make($request->all(), [
            'mobile' => 'required|numeric|min:10',
        ]);
        if ($validation->fails()) {
            $response['message'] = "Please provide your mobile number";
            return response()->json($response);
        }
        $counselor = CounselorMobile::where('mobile', $request->mobile)->first();
        if (!$counselor) {
            $response['message'] = "This Mobile number is not a registered mobile number";
            return response()->json($response);
        }
        $otp = OTPService::SendOTP($request->mobile, $counselor->counselor_id);
        $response['is_success'] = true;
        $response['message'] = "OTP has been sent to your mobile";
        $response['data'] = ['hash_key' => $otp->hash_key];
        return response()->json($response);
    }

    public function verify(Request $request) 
    {

        $validator = Validator::make($request->all(), [
            "code" => "required",
            "hash_key" => "required"
        ]);

        if ($validator->fails()) {
            $this->response->message = "All field is required";
            return $this->rModel();
        }
        $otp = OTPService::VerifyOtp($this->response, $request);
        if (!$otp) {
            return $this->rModel();
        }

        $entity = new CouselorLogin();
        $entity->counselor_id = $otp->user_id;
        $entity->api_token = hash('sha256', Str::random(60));
        $entity->ip_address = getenv("REMOTE_ADDR");
        $entity->device_name = $request->device_name;
        $entity->device_id = $request->device_id;
        $entity->save();
        $user = User::where('id', $otp->user_id)->first();
        
        Session::put('ip_address', $entity->ip_address);
        Auth::login($user);
        $this->response->is_success = true;
        $this->response->data = ['api_token' => $entity->api_token];
        $this->response->message = "User login done";
        return $this->rModel();
    }

    public function dashboard()
    {
        $counselor_id = auth()->user()->id;
        $today = date("Y-m-d");
        $all_assigned_leads = CounselorLead::where('counselor_id', $counselor_id)->select('lead_id')->distinct()->get();
        $total_assigned_leads = $all_assigned_leads->count();
        $status = 1;
        $interested_leads = 0;
        foreach ($all_assigned_leads as $leads) {
            $interest = AllLead::where('id', $leads->lead_id)->where('display',1)->where('status', 1)->count();
            if ($interest) {
                $interested_leads = $interested_leads + 1;
            }
        }
        $transfer_leads = SchoolLead::where('counselor_id', $counselor_id)->get();
        $admitted_leads = [];
        foreach ($transfer_leads as $lead) {
            $admission = Lead::with('admitted_school', 'school_leads')->where('id', $lead->lead_id)->where('admission', 1)->first();
            if (isset($admission)) {
                array_push($admitted_leads, $admission);
            }
        }
        // dd($admitted_leads);
        $total_admitted_leads = sizeof($admitted_leads);
        $total_called = CounselorLead::where('counselor_id', $counselor_id)->where('status', 1)->count();
        $pending_leads = CounselorLead::with('lead')
            ->where('counselor_id', $counselor_id)
            ->where('is_active', 1)
            ->whereHas('lead', function ($q) {
                $q->where('status', 3);
            })->count();

        $followup_leads = LeadFollowup::with('lead')
            ->where('counselor_id', $counselor_id)
            ->latest()
            ->get()
            ->unique('lead_id');
        $leads_followups = [];
        foreach ($followup_leads as $lead) {
            if ($lead->status == 1) {
                array_push($leads_followups, $lead);
            }
        }
        $total_followups = sizeof($leads_followups);

        return view('counselor.dashboard', compact('total_assigned_leads', 'interested_leads','total_admitted_leads', 'total_called', 'pending_leads', 'total_followups'));
    }

    public function new_assign_leads()
    {
        $counselor_id = auth()->user()->id;

        $counselor_leads = CounselorLead::with('lead')->where('counselor_id', $counselor_id)
            ->where('status', 0)
            ->where('is_active', 1)
            ->first();
        //return $counselor_leads;
        $pending_leads = CounselorLead::with('lead')
            ->where('counselor_id', $counselor_id)
            ->where('is_active', 1)
            ->whereHas('lead', function ($q) {
                $q->where('status', 3);
            })->count();

        $today = date("Y-m-d");

        $followup_leads = LeadFollowup::with('lead')
            ->where('counselor_id', $counselor_id)
            ->latest()
            ->get()
            ->unique('lead_id');
        $leads_followups = [];
        foreach ($followup_leads as $lead) {
            if ($lead->status == 1) {
                array_push($leads_followups, $lead);
            }
        }
        $total_followups = sizeof($leads_followups);
        return view('counselor.lead.new', compact('counselor_leads', 'pending_leads', 'total_followups'));
    }

    public function lead_details($id)
    {
        $counselor_id = auth()->user()->id;
        $lead_details = AllLead::where('id', $id)->where('display',1)->first();

        $remarks = LeadFollowup::where('lead_id', $id)->get();

        $transfer_schools = SchoolLead::with('school.school_address')->where('all_lead_id', $id)->get();
        $counselor_active = CounselorLead::where('counselor_id', $counselor_id)
            ->where('lead_id', $id)
            ->where('is_active', 1)
            ->first();

        $pending_leads = CounselorLead::with('lead')
            ->where('counselor_id', $counselor_id)
            ->where('is_active', 1)
            ->whereHas('lead', function ($q) {
                $q->where('status', 3);
            })->count();

        $today = date("Y-m-d");
        $is_mou = [];
        foreach ($transfer_schools as $school) {
            if ($school->school->is_mou == 1) {
                array_push($is_mou, $school->id);
            }
        }
        $followup_leads = LeadFollowup::with('lead')
            ->where('counselor_id', $counselor_id)
            ->latest()
            ->get()
            ->unique('lead_id');
        $leads_followups = [];
        foreach ($followup_leads as $lead) {
            if ($lead->status == 1) {
                array_push($leads_followups, $lead);
            }
        }
        $total_followups = sizeof($leads_followups);
        $schools = School::with('school_address')->get();
        return view('counselor.lead.details', compact('lead_details', 'is_mou','total_followups', 'pending_leads', 'schools','remarks', 'counselor_active', 'transfer_schools'));
    }
    
    // public function lead_edit($id)
    // {
    //     $lead_details = AllLead::where('id', $id)->first();
    //     return view('counselor.lead.edit', compact('lead_details'));
    // }
    
     public function lead_edit($id)
    {
        $lead_details = AllLead::where('id', $id)->where('display',1)->first();
        return view('counselor.lead.edit', compact('lead_details'));
    }

    public function lead_update(Request $request)
    {
      $lead_details = AllLead::where('id', $request->id)->first();
        $lead_details->name = $request->name;
        $lead_details->location = $request->location;
        $lead_details->location_for_school = $request->location_for_school;
        $lead_details->pincode = $request->pincode;
        $lead_details->email = $request->email;
        $lead_details->date_of_birth = $request->date_of_birth;
        $lead_details->board = $request->board;
        $lead_details->phone = $request->phone;
        $lead_details->parent_name = $request->parent_name;
        $lead_details->admission_for = $request->admission_for;
        $lead_details->remarks_school = $request->remarks_school;
        $lead_details->academic_year = $request->academic_year;
        $lead_details->parent_whatsapp_number = $request->parent_whatsapp_number;
        $lead_details->update($lead_details->toArray());
        return redirect()->back()->with('message', 'Lead has been updated successfully');
    }
   
    public function lead_delete($lead_id, $school_id)
    {
        $lead_del = SchoolLead::where('all_lead_id', $lead_id)
            ->where('school_id', $school_id)
            ->delete();
        return redirect()->back()->with('delete_message', 'Lead has been deleted successfully from the school panel');
    }

    public function submit_remarks(Request $request)
    {

        $entity = new LeadFollowup();
        $entity->lead_id = $request->lead_id;
        $entity->counselor_id = auth()->user()->id;
        $entity->remarks = $request->remarks;
        $entity->next_follow_up = $request->next_date;
        $entity->date_of_calling = date("Y-m-d");
        $entity->followup_time = $request->follow_up_time;
        $entity->status = $request->status;
        $entity->save();
        $lead = AllLead::where('id', $request->lead_id)->first();
        $lead->status = $request->status;
        $lead->update($lead->toArray());
        $counselor = CounselorLead::where('counselor_id', auth()->user()->id)
            ->where('lead_id', $request->lead_id)
            ->get();
        foreach ($counselor as $counsel) {
            $counsel->status = 1;
            $counsel->update($counsel->toArray());
        }
        if ($request->status == 5) {
            $school_id = $request->school_id;
            $all_lead_id = $request->lead_id;
            $student_lead = SchoolLead::where('school_id', $school_id)->where('all_lead_id', $all_lead_id)->first();
            $student_lead_id = $student_lead->lead_id;
            $lead_student = Lead::where('id', $student_lead_id)->first();
            $lead_student->admission = 1;
            $lead_student->update($lead_student->toArray());
            return redirect()->back()->with('message', 'remarks updated successfully');
        }
        return redirect()->back()->with('message', 'remarks updated successfully');
    }

    public function old_leads()
    {
        $counselor_id = auth()->user()->id;
        $old_leads = CounselorLead::with('lead')
            ->where('counselor_id', $counselor_id)
            ->where('status', 1)
            ->paginate(5);
        $pending_leads = CounselorLead::with('lead')
            ->where('counselor_id', $counselor_id)
            ->where('is_active', 1)
            ->whereHas('lead', function ($q) {
                $q->where('status', 3);
            })->count();

        $today = date("Y-m-d");

        $followup_leads = LeadFollowup::with('lead')
            ->where('counselor_id', $counselor_id)
            ->latest()
            ->get()
            ->unique('lead_id');
        $leads_followups = [];
        foreach ($followup_leads as $lead) {
            if ($lead->status == 1) {
                array_push($leads_followups, $lead);
            }
        }
        $total_followups = sizeof($leads_followups);
        return view('counselor.lead.old', compact('old_leads', 'pending_leads', 'total_followups'));
    }
    
    public function all_pending_leads()
    {
        $counselor_id = auth()->user()->id;
        $pending_leads = CounselorLead::with('lead')
            ->where('counselor_id', $counselor_id)
            ->where('is_active', 1)
            ->whereHas('lead', function ($q) {
                $q->where('status', 3);
            })->count();
        $counselor_leads = CounselorLead::with('lead')
            ->where('counselor_id', $counselor_id)
            ->where('is_active', 1)
            ->whereHas('lead', function ($q) {
                $q->where('status', 3);
            })->paginate(5);
        // return $counselor_leads;
        $followup_leads = LeadFollowup::with('lead')
            ->where('counselor_id', $counselor_id)
            ->latest()
            ->get()
            ->unique('lead_id');
        $leads_followups = [];
        foreach ($followup_leads as $lead) {
            if ($lead->status == 1) {
                array_push($leads_followups, $lead);
            }
        }
        $total_followups = sizeof($leads_followups);
        return view('counselor.lead.pending', compact('total_followups', 'pending_leads', 'counselor_leads'));
    }

    public function followup_leads()
    {
        $counselor_id = auth()->user()->id;
        $followup_leads = LeadFollowup::with('lead')
            ->where('counselor_id', $counselor_id)
            ->latest()
            ->get()
            ->unique('lead_id');
        $leads_followups = [];
        foreach ($followup_leads as $lead) {
            if ($lead->status == 1) {
                array_push($leads_followups, $lead);
            }
        }
        $total_followups = sizeof($leads_followups);
        return view('counselor.lead.followup', compact('leads_followups'));
    }

    public function lead_search(Request $request)
    {
        $counselor_id = auth()->user()->id;
        $search_leads = AllLead::with('counselor_lead')->where('display',1)->whereHas('counselor_lead', function ($q) use ($counselor_id) {
            $q->where('counselor_id', $counselor_id);
        })->where('name', 'like', '%' . $request->lead_name . '%')->get();
        //return $search_leads;
        $pending_leads = CounselorLead::with('lead')
            ->where('counselor_id', $counselor_id)
            ->where('is_active', 1)
            ->whereHas('lead', function ($q) {
                $q->where('status', 3);
            })->count();

        $today = date("Y-m-d");
        $followup_leads = LeadFollowup::where('next_follow_up', $today)
            ->where('counselor_id', $counselor_id)
            ->count();
        return view('counselor.lead.search', compact('search_leads', 'pending_leads', 'followup_leads'));
    }
    
    public function lead_search_phone(Request $request)
    {
        $counselor_id = auth()->user()->id;
        $search_leads = AllLead::with('counselor_lead')->where('display',1)->whereHas('counselor_lead', function ($q) use ($counselor_id) {
            $q->where('counselor_id', $counselor_id);
        })->where('phone', 'like', '%' . $request->lead_phone . '%')->get();
        //return $search_leads;
        $pending_leads = CounselorLead::with('lead')
            ->where('counselor_id', $counselor_id)
            ->where('is_active', 1)
            ->whereHas('lead', function ($q) {
                $q->where('status', 3);
            })->count();

        $today = date("Y-m-d");
        $followup_leads = LeadFollowup::where('next_follow_up', $today)
            ->where('counselor_id', $counselor_id)
            ->count();
        return view('counselor.lead.search', compact('search_leads', 'pending_leads', 'followup_leads'));
    }

    public function interested_leads()
    {
        $counselor_id = auth()->user()->id;
        $assigned_leads = CounselorLead::where('counselor_id', $counselor_id)->select('lead_id')->distinct()->get();
        $interested_leads = array();
        foreach ($assigned_leads as $lead) {
            $lead = AllLead::where('id', $lead->lead_id)->where('display',1)->where('status', 1)->first();
            array_push($interested_leads, $lead);
        }
        $pending_leads = CounselorLead::with('lead')
            ->where('counselor_id', $counselor_id)
            ->where('is_active', 1)
            ->whereHas('lead', function ($q) {
                $q->where('status', 3);
            })->count();

        $today = date("Y-m-d");

        $followup_leads = LeadFollowup::with('lead')
            ->where('counselor_id', $counselor_id)
            ->latest()
            ->get()
            ->unique('lead_id');
        $leads_followups = [];
        foreach ($followup_leads as $lead) {
            if ($lead->status == 1) {
                array_push($leads_followups, $lead);
            }
        }
        $total_followups = sizeof($leads_followups);

        return view('counselor.lead.interested', compact('interested_leads', 'total_followups', 'pending_leads'));
    }
    public function logout()
    {
        Session::flush();

        // Auth::logout();

        return redirect()->route('schools.index');
    }
}
