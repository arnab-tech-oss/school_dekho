<?php

namespace App\Http\Livewire;

use App\Models\AllLead;
use App\Models\School;
use App\Models\Lead;
use App\Models\SchoolLead;
use App\Mail\SchoolLeadTransfer;
use App\Mail\SchoolLeadTransferNonMou;
use App\Models\SchoolContact;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use DB;

class LeadSchool extends Component
{
    public $search = null;
    public $student;
    public $parent_name;
    public $contact_1;
    public $contact_2;
    public $admission_for;
    public $location;
    public $date_of_birth;
    public $location_for_school;
    public $remarks_school;
    public $pincode;
    public $board;
    public $schools = array();

    // protected $queryString = ['search'];

    public function search($search)
    {
        $this->search = $search;
    }

    public function saveLead()
    {
        $all_lead = new AllLead();
        $all_lead->name = $this->student;
        $all_lead->location = $this->location;
        $all_lead->location_for_school = $this->location_for_school;
        $all_lead->pincode = $this->pincode;
        $all_lead->date_of_birth = $this->date_of_birth;
        $all_lead->board = $this->board;
        $all_lead->phone = $this->contact_1;
        $all_lead->parent_name = $this->parent_name;
        $all_lead->admission_for = $this->admission_for;
        $all_lead->remarks_school = $this->remarks_school;
        $all_lead->status = 0;
        $all_lead->transfer_status = 1;
        $all_lead->save();

        $lead = new Lead();

        $lead->student_name = $this->student;
        $lead->student_contact1 = $this->contact_1;
        $lead->student_contact2 = $this->contact_2;
        $lead->admission_for = $this->admission_for;
        $lead->parent_name = $this->parent_name;
        $lead->remarks = $this->remarks_school;
        $lead->location = $this->search;
        $lead->admission = '0';
        $lead->lead_mode = "manual";

        $lead->save();

         $mailData = [
            'title' => 'Mail from School Dekho'
        ];
        foreach ($this->schools as $school) {
            $school_lead = new SchoolLead();
            $school_lead->lead_id = $lead->id;
            $school_lead->all_lead_id = $all_lead->id;
            $school_lead->school_id = $school;
            $school_lead->is_open = '1';
            $school_mail_id = SchoolContact::where('school_id', $school)->first();
            //Mail::to($school_mail_id->email)->send(new SchoolLeadTransfer($mailData));

             $is_mou = School::where('id', $school)->first();
            if ($is_mou->is_mou) {
                $school_mail_id = SchoolContact::where('school_id', $school)->where('is_subscribe', 1)->first();
                Mail::to($school_mail_id->email)->send(new SchoolLeadTransfer($school));
            } else {
                $school_mail_id = SchoolContact::where('school_id', $school)->where('is_subscribe', 1)->first();
                Mail::to($school_mail_id->email)->send(new SchoolLeadTransferNonMou($school));
            }
            $school_lead->save();
        }

        $this->reset();

        return redirect()->back()->with('success', 'Leads has been added successfully');;
    }
    public function render()
    {
        if (!$this->search) {
            return view('livewire.lead-school', [
                'leads' => null
            ]);
        }
        return view(
            'livewire.lead-school',
            [
                'leads' => DB::table('schools')
                    ->select('*')
                    ->join('school_contacts', 'schools.id', '=', 'school_contacts.school_id')
                    ->where('school_contacts.address', 'like', '%' . $this->search . '%')
                    ->orWhere('status',1)
                    ->orWhere('school_contacts.pincode', 'like', '%' . $this->search . '%')
                    ->orWhere('schools.name', 'like', '%' . $this->search . '%')->get()
            ]
        );
    }
}
