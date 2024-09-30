<?php
namespace App\Http\Livewire\SchoolAdmin;
use App\Models\School;
use Livewire\Component;
use App\Models\SchoolFees;
use App\Models\SchoolHour;
use App\Models\SchoolBoard;
use App\Models\SchoolImage;
use App\Models\SchoolMedium;
use App\Models\SchoolContact;
use App\Models\SchoolAcademic;
use App\Models\SchoolCategory;
use App\Models\SchoolFacility;
use App\Models\SeatAvailability;
use App\Models\SchoolEligibility;
use Illuminate\Support\Facades\Session;

class Info extends Component
{
    public $school_name, $categories, $boards, $mediums, $registration_no, $category, $school_type, $board, $medium, $about;

    public function render()
    {
        $this->categories = SchoolCategory::all();
        $this->boards = SchoolBoard::all();
        $this->mediums = SchoolMedium::all();
        return view('livewire.school-admin.info');
    }

    public function save()
    {
        $entity = new School();
        $entity->name = $this->school_name;
        $entity->about = $this->about;
        $entity->registration_no = $this->registration_no;
        $entity->board = $this->board;
        $entity->school_type = $this->school_type;
        $entity->school_medium_id = $this->medium;
        $entity->category = $this->category;
        $entity->save();
        $school_about = new SchoolContact();
        $school_about->school_id = $entity->id;
        $school_about->save();
        $school_eligibility = new SchoolEligibility();
        $school_eligibility->school_id = $entity->id;
        $school_eligibility->save();
        $schoolacademics = new SchoolAcademic();
        $schoolacademics->school_id = $entity->id;
        $schoolacademics->save();
        $schoolacademics1 = new SchoolAcademic();
        $schoolacademics1->school_id = $entity->id;
        $schoolacademics1->save();
        $school_fees = new SchoolFees();
        $school_fees->school_id = $entity->id;
        $school_fees->save();
        $school_seat = new SeatAvailability();
        $school_seat->school_id = $entity->id;
        $school_seat->save();
        $school_facility = new SchoolFacility();
        $school_facility->school_id = $entity->id;
        $school_facility->save();
        $school_gallery = new SchoolImage();
        $school_gallery->school_id = $entity->id;
        $school_gallery->save();
        $school_hours = new SchoolHour();
        $school_hours->school_id = $entity->id;
        $school_hours->save();
        $id = $entity->id;
        $name = str_replace(" ", "-", $entity->name) . "-" . $id;
        $school_slug = School::where('id', $id)->update(['slug' => $name]);
        Session::put('school_id', $id);
        $this->reset();
        session()->flash('message', 'School Timing Added Successfully.');
        return redirect()->route('schooladmin.add');
    }
}
