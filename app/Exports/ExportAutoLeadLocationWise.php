<?php

namespace App\Exports;

use App\Models\SchoolContact;
use App\Models\SchoolNewApplication;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use stdClass;

class ExportAutoLeadLocationWise implements FromCollection, WithHeadings
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
        $state_id = $this->request->state_id;
        $district_id = $this->request->district_id;
        $all_school_ids = SchoolContact::where('state_id', $state_id)->where('district_id', $district_id)->pluck('school_id');
        $lead_collection = [];
        foreach ($all_school_ids as $school_id) {
            $leads_against_school = SchoolNewApplication::with('school')->whereBetween('created_at', [$from, $to])->where('school_id', $school_id)->get();
            foreach ($leads_against_school as $lead) {
                $abc = new stdClass();
                $abc->lead_id = $lead->id;
                $abc->student_name = $lead->name;
                $abc->student_contact_number = $lead->phone;
                $abc->date_of_application = $lead->created_at->format('d/m/Y');
                $abc->admission = $lead->seeking_class;
                $abc->school_name = $lead->school->name;
                array_push($lead_collection, $abc);
            }
        }
        return collect($lead_collection);
    }
    public function headings(): array
    {
        return ["Lead ID", "Student Name", "Student Contact Number", "Date of Application", "Admission", "School Name"];
    }
}
