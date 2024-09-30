<?php

namespace App\Http\Livewire\SchoolAdmin;

use App\Models\School;
use Livewire\Component;
use App\Core\FileHelper;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Session;

class Principal extends Component
{
    use WithFileUploads;
    public $principal_name, $principal_desk, $principal_pic, $principal_designation;
    public function render()
    {
        return view('livewire.school-admin.principal');
    }
    public function save()
    {
        $x = Session::get('school_id');
        $school_about = School::where('id', $x)->first();
        // dd($this->principal_name);
        $school_about->principal_name = $this->principal_name;
        $school_about->principal_designation = $this->principal_designation;
        $school_about->principal_desk = $this->principal_desk;
        // $school_about->principal_pic = FileHelper::Upload($this->principal_pic, null, FileHelper::$principal)->upload_name;
        $school_about->principal_pic = $this->principal_pic->store('public/principal');
        $school_about->update($school_about->toArray());
        $this->reset();
        session()->flash('message', 'Principal Details Added Successfully.');
        return redirect()->back();
    }
}
