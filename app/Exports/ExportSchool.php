<?php

namespace App\Exports;

use App\Models\District;
use App\Models\School;
use App\Models\State;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use stdClass;

class ExportSchool implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;
    protected $request;
    public function __construct($request)
    {
        $this->request = $request;
    }
    public function collection()
    {
        $state_id = $this->request->state_id;
        $district_id = $this->request->district_id;
        $schools = []; 
        $selected_schools = School::with('school_address')->whereHas('school_address', function ($query) use ($state_id, $district_id) {
                $query->where('state_id', $state_id)->where('district_id', $district_id)->where('is_complete', 1);
        })->get();
      
        foreach ($selected_schools as $school) {
            $abc = new stdClass();
            $abc->name = $school->name;
            $abc->address = $school->school_address[0]->address;
            $abc->state = State::find($school->school_address[0]->state_id)->state;
            $abc->district = District::find($school->school_address[0]->district_id)->district;
            $abc->city = $school->school_address[0]->city;
            $abc->pincode = $school->school_address[0]->pincode;
            $abc->contact = $school->school_address[0]->contact;
            $abc->principal_name = $school->principal_name;
            $abc->school_email = $school->school_address[0]->email;
            array_push($schools, $abc);
        }
        return collect($schools);
    }

    public function headings(): array
    {
        return ["School Name", "Address", "State", "District", "City", "Pincode", "Contact", "Prnicipal Name", "School Email"];
    }
}
