<?php
namespace App\Exports;

use App\Models\SchoolApplicatrionForm;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use stdClass;

class SchoolApplication implements FromCollection, WithHeadings
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
        $from = $this->request->start_date;
        $to = $this->request->end_date;
        $school_id = $this->request->school_id;
        $school_applicationform_data = SchoolApplicatrionForm::with('school.school_address.states')->whereBetween('created_at', [$from, $to])->where('school_id', $school_id)->get();
        if ($school_id == "all") {
            $school_applicationform_data = SchoolApplicatrionForm::with('school.school_address.states')->whereBetween('created_at', [$from, $to])->get();
            
        }
        $data_for_excel = [];
        foreach ($school_applicationform_data as $data) {
            foreach ($data->fields as $field) {
                $excel_data = new stdClass();
                foreach ($field->elements as $element) {
                    if ($element->name == "name_of_the_student") {
                        $excel_data->name = $element->value;
                    }
                    if ($element->name == "phone") {
                        $excel_data->phone = $element->value;
                    }
                    if ($element->name == "class_seeking_admission") {
                        $excel_data->admission_for = $element->value;
                    }
                    if ($element->name == "pin_code") {
                        $excel_data->pincode = $element->value;
                    }
                    $excel_data->school = $data->school->name;
                    $excel_data->school_address = $data->school->school_address[0]->address;
                    if(isset($data->school->school_address[0]->states->state)){
                    $excel_data->state = $data->school->school_address[0]->states->state;
                    }
                    if(isset($data->school->school_address[0]->districts->district)){
                    $excel_data->district = $data->school->school_address[0]->districts->district;
                    }
                    $excel_data->date = date("Y-m-d ", strtotime($data->created_at));
                }
            }
            array_push($data_for_excel, $excel_data);
        }
        return collect($data_for_excel);
    }
    public function headings(): array
    {
        return ["Name", "School Name","School Address","State","District","Date", "Pincode", "Admission For", "Contact Number"];
    }
}
