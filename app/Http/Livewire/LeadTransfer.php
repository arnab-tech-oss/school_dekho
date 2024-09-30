<?php

namespace App\Http\Livewire;

use App\Models\School;
use App\Models\Lead;
use App\Models\SchoolLead;
use App\Models\SchoolContact;
use App\Mail\SchoolLeadTransfer;
use App\Mail\SchoolLeadTransferNonMou;
use App\Models\AllLead;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use DB;

class LeadTransfer extends Component
{
    public $search = null;
    public $lead_id;
    public $schools = array();

    // protected $queryString = ['search'];

    public function mount($lead_id)
    {
        $this->lead_id = $lead_id;
    }

    public function search($search)
    {

        $this->search = $search;
    }

    public function transferLead()
    {

        // $lead = new Lead();
        // $lead = new Lead();

        // $lead->student_name = $this->student;
        // $lead->student_contact1 = $this->contact_1;
        // $lead->student_contact2 = $this->contact_2;
        // $lead->admission_for = $this->admission_for;
        // $lead->location = $this->search;
        // $lead->admission = '0';
        // $lead->lead_mode = "manual";

        // $lead->save();
        // dd($this->schools);
        // $schools = School::where('name', 'like', '%'.$request->location.'%')->take(10)->get();
        // $schools = DB::table('schools')
        //             ->select('*')
        //             ->join('school_contacts', 'schools.id', '=', 'school_contacts.school_id')
        //             ->where('school_contacts.city', 'like', '%'.$request->location.'%')
        //             ->orWhere('school_contacts.pincode', 'like', '%'.$request->location.'%')
        //             ->orWhere('schools.name', 'like', '%'.$request->location.'%')
        //             ->get();
        
    
      
        foreach ($this->schools as $school) {
            $school_lead = new SchoolLead();
            $school_lead->lead_id = $this->lead_id;
            $school_lead->all_lead_id = $this->lead_id;
            $school_lead->school_id = $school;
            $school_lead->is_open = '1';
            $school_lead->counselor_id = auth()->user()->id;
            $school_lead->save();
            $lead_details = AllLead::where('id', $this->lead_id)->first();
            $student_lead = new Lead();
            $student_lead->school_id = $school;
            $student_lead->student_name = $lead_details->name;
            $student_lead->student_contact1 = $lead_details->phone;
            $student_lead->admission_for = $lead_details->admission_for;
            $student_lead->location = $lead_details->location;
            $student_lead->lead_mode = "manual";
            $student_lead->remarks = $lead_details->remarks_school;
            $student_lead->save();
            $school_lead_details = SchoolLead::where('lead_id', $this->lead_id)->where('school_id', $school)->first();
            $school_lead_details->lead_id = $student_lead->id;
            $school_lead_details->update($school_lead_details->toArray());
            $is_mou = School::where('id', $school)->first();
            $is_subscription = SchoolContact::where('school_id',$school)->where('is_subscribe',1)->where('school_id',$school)->first();
            if ($is_mou->is_mou && $is_subscription->is_subscribe) {
                $school_mail_id = SchoolContact::where('school_id', $school)->where('is_subscribe', 1)->first();
                
                Mail::to($school_mail_id?->email)->send(new SchoolLeadTransfer($school));
            } elseif($is_subscription?->is_subscribe) {
                $school_mail_id = SchoolContact::where('school_id', $school)->where('is_subscribe', 1)->first();
                Mail::to($school_mail_id?->email)->send(new SchoolLeadTransferNonMou($school));
            }
        }

        $this->reset();

        // $this->dispatchBrowserEvent(
        //     'alert',
        //     ['type' => 'success',  'message' => 'Leads has been added successfully']
        // );

        return redirect()->back()->with('success', 'Leads has been added successfully');;
    }
    public function render()
    {
        if (!$this->search) {
            return view('livewire.lead-transfer', [
                'leads' => null
            ]);
        }
        return view(
            'livewire.lead-transfer',
            [
                'leads' => DB::table('schools')
                    ->select('*')
                    ->join('school_contacts', 'schools.id', '=', 'school_contacts.school_id')
                    ->where('schools.status',1)
                    ->where('school_contacts.address', 'like', '%' . $this->search . '%')
                    ->orWhere('school_contacts.pincode', 'like', '%' . $this->search . '%')
                    ->orWhere('schools.name', 'like', '%' . $this->search . '%')->get()
            ]
        );
    }
}
