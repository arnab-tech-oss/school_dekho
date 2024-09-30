<?php

namespace App\Exports;

use App\Models\SchoolNewApplication;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use stdClass;

class ExportAutoLeadSchoolWise implements FromCollection, WithHeadings
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
            $output = SchoolNewApplication::with('school')->wherebetween('created_at', [$from, $to])->get();
        } else {
            $output = SchoolNewApplication::with('school')->wherebetween('created_at', [$from, $to])->where('school_id', $school_id)->get();
        }
        foreach ($output as $student) {
            $abc = new stdClass();
            $abc->lead_id = $student->id;
            $abc->student_name = $student->name;
            $abc->student_contact_number = $student->phone;
            $abc->date_of_application = $student->created_at->format('Y-m-d');
            $abc->admission = $student->seeking_class;
            $abc->school_name = $student->school->name;
            array_push($lead_collection, $abc);
        }
        return collect($lead_collection);
    }

    public function headings(): array
    {
        return ["Lead ID", "Student Name", "Student Contact Number", "Date of Application", "Admission", "School Name"];
    }
}
