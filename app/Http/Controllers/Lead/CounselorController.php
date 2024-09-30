<?php

namespace App\Http\Controllers\Lead;

use App\Charts\CounselorChart;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AllLead;
use App\Models\CounselorLead;
use App\Models\CounselorMobile;
use App\Models\LeadFollowup;
use App\Models\SchoolLead;
use Illuminate\Support\Facades\Hash;

class CounselorController extends Controller
{
    public function dashboard()
    {
        $number_of_leads = AllLead::where('display',1)->count();
        $assigned_leads  = AllLead::where('status', '!=', 0)->where('display',1)->count();
        $counselors = User::where('role', 6)->count();
        $interested_leads = AllLead::where('status', 1)->where('display',1)->count();
        $not_interested_leads = AllLead::where('status', 2)->where('display',1)->count();
        // $transfer_leads = AllLead::with('transfer_lead', 'counselor_lead.counselor')->where('display', 1)->get();
        // dd($transfer_leads[0]->transfer_lead);
        $total_school_transfer_lead_count = SchoolLead::distinct('all_lead_id')->count();

        // $school_transfer = [];
        $total_admission = AllLead::where('status', 5)->where('display',1)->count();
        // foreach ($transfer_leads as $lead) {
        //     if (sizeof($lead->transfer_lead) > 0) {
        //         array_push($school_transfer, $lead);
        //     }
        // }
        // echo $total_school_transfer_lead_count = sizeof($school_transfer);
        // die;
        return view('lead.dashboard', compact('number_of_leads', 'total_admission','assigned_leads', 'counselors', 'interested_leads', 'not_interested_leads','total_school_transfer_lead_count'));
    }

    public function list()
    {
        $counselors = User::with('assign_leads')->where('role', 6)->paginate(4);
        return view('lead.counselor.list', compact('counselors'));
    }

    public function add()
    {
        return view('lead.counselor.add');
    }

    public function details($id, CounselorChart $chart)
    {
        $interested_leads = CounselorLead::with('lead')->where('counselor_id', $id)->whereHas('lead', function ($query) {
            $query->where('status', 1);
        })->where('is_active', 1)->count();

        $not_interested_leads = CounselorLead::with('lead')->where('counselor_id', $id)->whereHas('lead', function ($query) {
            $query->where('status', 2);
        })->where('is_active', 1)->count();

        $no_respond_leads = CounselorLead::with('lead')->where('counselor_id', $id)->whereHas('lead', function ($query) {
            $query->where('status', 3);
        })->where('is_active', 1)->count();

        $admission_taken = CounselorLead::with('lead')->where('counselor_id', $id)->whereHas('lead', function ($query) {
            $query->where('status', 5);
        })->where('is_active', 1)->count();

        $remarks = LeadFollowup::with('lead')->where('counselor_id', $id)->get();
        $counselor_name = User::where('id', $id)->first();
        $counselor_transfer_leads = SchoolLead::with('school', 'lead_transfer')->where('counselor_id', $id)->get();
        $show_name = "Lead Analysis Of" . "  " . $counselor_name->name;
        return view('lead.counselor.details', ['chart' => $chart->build($show_name, $interested_leads, $not_interested_leads, $no_respond_leads, $admission_taken)], compact('remarks', 'counselor_name', 'counselor_transfer_leads'));
    }

    public function submit(Request $request)
    {
        $mobile = CounselorMobile::where('mobile', $request->mobile)->get();
        if (sizeof($mobile) > 0) {
            return redirect()->back()->with('message', 'Mobile number already exists');
        }
        $entity = new User();
        $entity->name = $request->name;
        $entity->email = $request->email;
        $password = '123456';
        $entity->password = Hash::make($password);
        $entity->role = 6;
        $entity->save();
        $counselor_mobile = new CounselorMobile();
        $counselor_mobile->counselor_id = $entity->id;
        $counselor_mobile->mobile = $request->mobile;
        $counselor_mobile->save();
        return redirect()->back()->with('message', 'Counselor Added Successfully');
    }
}
