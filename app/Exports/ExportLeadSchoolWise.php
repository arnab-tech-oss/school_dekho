<?php

namespace App\Exports;

use App\Models\SchoolLead;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use stdClass;

class ExportLeadSchoolWise implements FromCollection, WithHeadings
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
        $lead_collection = [];
        if ($school_id == "all_schools") {
            $output = SchoolLead::with('lead_transfer', 'school')->wherebetween('created_at', [$from, $to])->get();
        } else {
            $output = SchoolLead::with('lead_transfer', 'school')->wherebetween('created_at', [$from, $to])->where('school_id', $school_id)->get();
        }
        foreach ($output as $student) {
            $abc = new stdClass();
            $abc->lead_id = $student->lead_id;
            $abc->student_name = $student->lead_transfer->name;
            $abc->student_contact_number = $student->lead_transfer->phone;
            $abc->date_of_transfer = $student->created_at->format('Y-m-d');
            $abc->admission = $student->lead_transfer->admission_for;
            if (isset($student->school->name)) {

                $abc->school_name = $student->school->name;
            } else {
                $abc->school_name = "No School";
            }
            // dd($abc);
            array_push($lead_collection, $abc);
        }
        return collect($lead_collection);
    }

    public function headings(): array
    {
        return ["Lead ID", "Student Name", "Student Contact Number", "Date of Transfer", "Admission", "School Name"];
    }
}
