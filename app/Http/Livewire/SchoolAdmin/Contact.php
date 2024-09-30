<?php

namespace App\Http\Livewire\SchoolAdmin;

use App\Models\State;
use Livewire\Component;
use App\Models\District;
use App\Models\SchoolContact;
use Illuminate\Support\Facades\Session;

class Contact extends Component
{
    public $states, $districts, $address, $state_id, $district_id, $city, $pincode;
    public $latitude, $longitude, $mobile, $alt_contact, $fb, $insta, $twitter, $linkedin, $email;
    public function render()
    {
        $this->states = State::all();
        $this->districts = District::orderby('district')->get();
        return view('livewire.school-admin.contact');
    }
    public function save()
    {
        $x = Session::get('school_id');
        $contact_details = SchoolContact::where('school_id', $x)->first();
        $contact_details->address = $this->address;
        $contact_details->city = $this->city;
        $contact_details->district_id = $this->district_id;
        $contact_details->state_id = $this->state_id;
        $contact_details->pincode = $this->pincode;
        $contact_details->contact = $this->mobile;
        $contact_details->alt_contact = $this->alt_contact;
        $contact_details->email = $this->email;
        $contact_details->fb = $this->fb;
        $contact_details->insta = $this->insta;
        $contact_details->twitter = $this->twitter;
        $contact_details->linkedin = $this->linkedin;
        $contact_details->lattitude = $this->latitude;
        $contact_details->longitude = $this->longitude;
        $contact_details->update($contact_details->toArray());
        $this->reset();
        session()->flash('message_contact', 'School Contact Details Added Successfully.');
    }
}
