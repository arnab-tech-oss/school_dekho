<?php

namespace App\Http\Livewire\SchoolAdmin;

use Livewire\Component;
use App\Models\SchoolFees;
use Illuminate\Support\Facades\Session;

class Feesstructure extends Component
{
    public $pre_nursery1;
    public $pre_nursery2;
    public $nursery_1;
    public $lkg_1;
    public $ukg_1;
    public $kg_1;
    public $class_one;
    public $class_two;
    public $class_three;
    public $class_four;
    public $class_five;
    public $class_six;
    public $class_seven;
    public $class_eight;
    public $class_nine;
    public $class_ten;
    public $class_eleven;
    public $class_twelve;
    public $nursery_2;
    public $lkg_2;
    public $ukg_2;
    public $kg_2;
    public $class_one2;
    public $class_two2;
    public $class_three2;
    public $class_four2;
    public $class_five2;
    public $class_six2;
    public $class_seven2;
    public $class_eight2;
    public $class_nine2;
    public $class_ten2;
    public $class_eleven2;
    public $class_twelve2;
    public function render()
    {
        return view('livewire.school-admin.feesstructure');
    }
    public function data_structure($p, $q)
    {
        $x = [];
        array_push($x, $p, $q);
        $y = collect($x)->implode(',');
        return $y;
    }
    public function save()
    {
        $x =  Session::get('school_id');
        $school_fees_details = SchoolFees::where('school_id', $x)->first();
        $school_fees_details->pre_nursery = $this->data_structure($this->pre_nursery1, $this->pre_nursery2);
        $school_fees_details->nursery = $this->data_structure($this->nursery_1, $this->nursery_2);
        $school_fees_details->lkg = $this->data_structure($this->lkg_1, $this->lkg_2);
        $school_fees_details->ukg = $this->data_structure($this->ukg_1, $this->ukg_2);
        $school_fees_details->kg = $this->data_structure($this->kg_1, $this->kg_2);
        $school_fees_details->class_one = $this->data_structure($this->class_one, $this->class_one2);
        $school_fees_details->class_two = $this->data_structure($this->class_two, $this->class_two2);
        $school_fees_details->class_three = $this->data_structure($this->class_three, $this->class_three2);
        $school_fees_details->class_four = $this->data_structure($this->class_four, $this->class_four2);
        $school_fees_details->class_five = $this->data_structure($this->class_five, $this->class_five2);
        $school_fees_details->class_six = $this->data_structure($this->class_six, $this->class_six2);
        $school_fees_details->class_seven = $this->data_structure($this->class_seven, $this->class_seven2);
        $school_fees_details->class_eight = $this->data_structure($this->class_eight, $this->class_eight2);
        $school_fees_details->class_nine = $this->data_structure($this->class_nine, $this->class_nine2);
        $school_fees_details->class_ten = $this->data_structure($this->class_ten, $this->class_ten2);
        $school_fees_details->class_eleven = $this->data_structure($this->class_eleven, $this->class_eleven2);
        $school_fees_details->class_twelve = $this->data_structure($this->class_twelve, $this->class_twelve2);
        $school_fees_details->update($school_fees_details->toArray());
        $this->reset();
        session()->flash('fees_message', 'School Fees Details Added Successfully.');
    }
}
