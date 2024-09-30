<?php
namespace App\Http\Livewire\SchoolAdmin;
use App\Models\SchoolEligibility;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
class Eligibility extends Component
{
    public $pre_nursery, $nursery, $lkg, $ukg, $kg;
    public $class_one, $class_two, $class_three, $class_four;
    public $class_five, $class_six, $class_seven, $class_eight;
    public $class_nine, $class_ten, $class_eleven, $class_twelve;
    public function render()
    {
        return view('livewire.school-admin.eligibility');
    }
    public function save()
    {
        $x = Session::get('school_id');
        $school_eligibility = SchoolEligibility::where('school_id', $x)->first();
        $school_eligibility->pre_nursery = $this->pre_nursery;
        $school_eligibility->nursery = $this->nursery;
        $school_eligibility->lkg = $this->lkg;
        $school_eligibility->ukg = $this->ukg;
        $school_eligibility->kg = $this->kg;
        $school_eligibility->class_one = $this->class_one;
        $school_eligibility->class_two = $this->class_two;
        $school_eligibility->class_three = $this->class_three;
        $school_eligibility->class_four = $this->class_four;
        $school_eligibility->class_five = $this->class_five;
        $school_eligibility->class_six = $this->class_six;
        $school_eligibility->class_seven = $this->class_seven;
        $school_eligibility->class_eight = $this->class_eight;
        $school_eligibility->class_nine = $this->class_nine;
        $school_eligibility->class_ten = $this->class_ten;
        $school_eligibility->class_eleven = $this->class_eleven;
        $school_eligibility->class_twelve = $this->class_twelve;
        $school_eligibility->update($school_eligibility->toArray());
        $this->reset();
        session()->flash('eligibility_message', 'School Contact Details Added Successfully.');
    }
}
