<?php

namespace App\Http\Controllers\Lead;

use App\Models\User;
use App\Models\School;
use App\Models\AllLead;
use App\Models\SchoolLead;
use App\Imports\LeadImport;
use App\Models\LeadFollowup;
use Illuminate\Http\Request;
use App\Models\CounselorLead;
use App\Http\Controllers\Controller;
use App\Core\BaseController;
use App\Core\ColectionPaginate;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class LeadController extends BaseController
{
    public function Add()
    {
        return view('lead.leads.add');
    }
    
    public function direct()
    {
        return view('lead.leads.direct');
    }

    public function Submit(Request $request)
    {
        $entity = new AllLead();
        $entity->name = $request->name;
        $entity->location = $request->location;
        $entity->pincode = $request->pincode;
        $entity->email = $request->email;
        $entity->board = $request->board;
        $entity->phone = $request->phone;
        $exists = AllLead::where('phone', $request->phone)->where('display',1)->first();
        if (isset($exists)) {
            return redirect()->back()->with('error', 'Lead already exists');
        }
        $entity->parent_name = $request->parent_name;
        $entity->admission_for = $request->admission_for;
        $entity->remarks = "New Data";
        $entity->status  = 0;
        $entity->save();
        return redirect()->back()->with('message', 'Lead Added Successfully');
    }

    public function edit($id)
    {
        $lead_details = AllLead::where('id', $id)->first();
        return view('lead.leads.edit', compact('lead_details'));
    }

    public function update(Request $request)
    {
        $lead = AllLead::where('id', $request->id)->first();
        $lead->name = $request->name;
        $lead->location = $request->location;
        $lead->pincode = $request->pincode;
        $lead->board = $request->board;
        $lead->email = $request->email;
        $lead->phone = $request->phone;
        $lead->remarks = "New Data";
        $lead->parent_name = $request->parent_name;
        $lead->admission_for = $request->admission_for;
        $lead->update($lead->toArray());
        return redirect()->back()->with('message', "Lead updated successfully");
    }

    public function List()
    {
        $leads = AllLead::with('counselor_lead.counselor')->where('lead_source','!=', 'school_application_new')->where('display',1)->paginate(10);
        $counselors = User::where('role', 6)->get();
        return view('lead.leads.list', compact('leads', 'counselors'));
    }
    
    public function lead_by_location()
    {
        $leads = AllLead::with('counselor_lead.counselor')->where('display',1)->paginate(10);
        $all_lead_locations = AllLead::select('location')->where('display',1)->groupBy('location')->get();
        $counselors = User::where('role', 6)->get();
        return view('lead.leads.location', compact('leads', 'counselors', 'all_lead_locations'));
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
            $lead_ids = Lead::where('school_id', $value->school_id)
                ->whereBetween('created_at', [$from, $to])
                ->select('lead_id')
                ->get();
            $lead_collection = array_merge($lead_collection, $lead_ids->toArray());
        }
        if (sizeof($lead_collection) == 0) {
            return redirect()->back()->with('message', 'No leads has been generated for this date range');
        }
        if (sizeof($school_ids) == 0) {
            return redirect()->back()->with('message', 'No leads has been generated from this city');
        } else {
            return Excel::download(new ExportLeadCity($request), $request->city . '.xlsx');
        }
    }

    public function search(Request $request)
    {
        $form_date = date($request->form_date);
        $to_date = date($request->to_date);
        $counselor_id = $request->counselor_id;
        $counselors = User::where('role', 6)->get();
        if ($counselor_id == "all_counselors") {
            $leads = AllLead::with('counselor_lead.counselor')->where('remarks', "New Data")->where('display', 1)->whereBetween('created_at', [$form_date, $to_date])->paginate(10);

            return view('lead.leads.list', compact('leads', 'counselors'));
        }
        $leads = AllLead::with('counselor_lead.counselor')->where('display',1)->whereHas('counselor_lead', function ($query) use ($counselor_id) {
            $query->where('counselor_id', $counselor_id);
        })->whereBetween('created_at', [$form_date, $to_date])->paginate(10);

        return view('lead.leads.list', compact('leads', 'counselors'));
    }

    public function lead_search(Request $request)
    {
        $leads = AllLead::with('counselor_lead.counselor')
            ->where('name', 'like', '%' . $request->lead_name . '%')
            ->where('display',1)
            ->paginate(4);
        $counselors = User::where('role', 6)->get();
        return view('lead.leads.list', compact('leads', 'counselors'));
    }

    public function interested()
    {
        $leads = AllLead::where('status', 1)->where('display',1)->paginate(4);
        $counselors = User::where('role', 6)->get();
        return view('lead.leads.list', compact('leads','counselors'));
    }

    public function not_interested()
    {
        $leads = AllLead::where('status', 2)->where('display',1)->paginate(4);
        $counselors = User::where('role', 6)->get();
        return view('lead.leads.list', compact('leads','counselors'));
    }

    public function pending()
    {
        $pending_leads = AllLead::with('counselor_lead.counselor')->where('display',1)->where('status', 6)->orWhere('status', 3)->paginate(4);
        return view('lead.leads.pending', compact('pending_leads'));
    }
    
    public function transfer_leads()
    {
        $transfer_leads = AllLead::with('transfer_lead', 'counselor_lead.counselor')->where('display',1)->get();
        $school_transfer = [];
        foreach ($transfer_leads as $lead) {
            if (sizeof($lead->transfer_lead) > 0) {
                array_push($school_transfer, $lead);
            }
        }
        $school_transfer = collect($school_transfer);
        $school_transfer = ColectionPaginate::paginate($school_transfer, $this->per_page);
        $schools = School::with('school_address')->get();
        return view('lead.leads.transfer', compact('school_transfer','schools'));
    }
    
    public function details($id)
    {
        $lead_details = AllLead::where('id', $id)->where('display',1)->first();
        $current_counselor = CounselorLead::with('counselor')->where('lead_id', $id)
            ->where('is_active', 1)
            ->first();
        $current_counselor_name = $current_counselor?->counselor->name;
        $current_counselor_id = $current_counselor?->counselor->id;
        $counselor_transfer = User::where('role', 6)
            ->where('id', '!=', $current_counselor_id)
            ->get();
        $lead_history = LeadFollowup::with('counselor')->where('lead_id', $id)->get();
        $transfer_schools = SchoolLead::with('school')->where('all_lead_id', $id)->get();
        return view('lead.leads.details', compact('lead_details', 'transfer_schools', 'current_counselor_name', 'counselor_transfer', 'lead_history'));
    }

    public function lead_transfer(Request $request)
    {
        CounselorLead::where('lead_id', $request->lead_id)->update([
            'is_active' => 0
        ]);
        $entity = new CounselorLead();
        $entity->counselor_id = $request->counselor_id;
        $entity->lead_id = $request->lead_id;
        $entity->status  = 0;
        $entity->is_active = 1;
        $entity->save();
        return redirect()->back()->with('message', 'Lead has been transfered successfully');
    }

    public function download()
    {
        $sample = storage_path("sample/LeadSample.xlsx");
        return response()->download($sample);
    }

    public function bulk_upload()
    {
        return view('lead.leads.bulk');
    }

    public function lead_bulk_upload() 
    {
        Excel::import(new LeadImport, request()->file('file'));
        return redirect()->back()->with('message', 'Lead Added Successfully');
    }

    public function lead_assign()
    {
        $assignleads = AllLead::where('status', 0)->where('display',1)->paginate(10);
        $counselors  = User::where('role', 6)->get();
        return view('lead.leads.assign', compact('assignleads', 'counselors'));
    }

    public function lead_assign_counselor(Request $request)
    {
        $leads = $request->lead;
        // return $leads;
        foreach ($leads as $lead) {
            $entity = new CounselorLead();
            $entity->counselor_id = $request->counselor;
            $entity->lead_id      = $lead;
            $entity->status       = 0;
            $entity->save();
            $leadid = AllLead::where('id', $lead)->where('display',1)->first();
            $leadid->status = 6;
            $leadid->update($leadid->toArray());
        }
        return redirect()->back()->with('message', "lead assign successfully");
    }
    public function logout()
    {
        Session::flush();

        // Auth::logout();

        return redirect()->route('schools.index');
    }
}
