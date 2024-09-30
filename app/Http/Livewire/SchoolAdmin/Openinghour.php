<?php
namespace App\Http\Livewire\SchoolAdmin;
use App\Models\SchoolHour;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
class Openinghour extends Component
{
    public $sun_f, $sun_t;
    public $mon_f, $mon_t;
    public $tue_f, $tue_t;
    public $wed_f, $wed_t;
    public $thu_f, $thu_t;
    public $fri_f, $fri_t;
    public $sat_f, $sat_t;
    public function render()
    {
        return view('livewire.school-admin.openinghour');
    }
    public function convert_array($value1, $value2)
    {
        $xd = [];
        array_push($xd, $value1, $value2);
        foreach ($xd as $x) {
            if (!$x || empty($x) || $x == null) {
                return ["00:00", "00:00"];
            }
        }
        return $xd;
    }
    public function save()
    {
        $x = Session::get('school_id');
        $timing_details = SchoolHour::where('school_id', $x)->first();
        $timing_details->sun = $this->convert_array($this->sun_f, $this->sun_t);
        $timing_details->mon = $this->convert_array($this->mon_f, $this->mon_t);
        $timing_details->tue = $this->convert_array($this->tue_f, $this->tue_t);
        $timing_details->wed = $this->convert_array($this->wed_f, $this->wed_t);
        $timing_details->thu = $this->convert_array($this->thu_f, $this->thu_t);
        $timing_details->fri = $this->convert_array($this->fri_f, $this->fri_t);
        $timing_details->sat = $this->convert_array($this->sat_f, $this->sat_t);
        $timing_details->update($timing_details->toArray());
        $this->reset();
        session()->flash('message_hour', 'School Timing Details Added Successfully.');
    }
}
