<?php

namespace App\Exports;

use App\Models\AllLead;
use App\Models\SchoolContact;
use App\Models\SchoolLead;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use stdClass;

class ExportLeadLocationWise implements FromCollection, WithHeadings
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
        $lead_collection = [];
        $all_school_ids = SchoolContact::where('state_id', $state_id)->where('district_id', $district_id)->pluck('school_id');
        // dd($all_school_ids);
        foreach ($all_school_ids as $school_id) {
            $all_lead_ids = SchoolLead::where('school_id', $school_id)->whereBetween('created_at', [$from, $to])->get();
            foreach ($all_lead_ids as $all_lead_id) {
                array_push($lead_collection, $all_lead_id);
            }
        }
        // dd($lead_collection);
        $lead_details = [];
        foreach ($lead_collection as $lead_id) {
            if (isset($lead_id->all_lead_id)) {
                $details = AllLead::where('id', $lead_id->all_lead_id)->first();
                $abc = new stdClass();
                $abc->lead_id = $details->id;
                $abc->student_name = $details->name;
                $abc->student_contact_number = $details->phone;
                $abc->date_of_transfer = $lead_id->created_at->format('Y-m-d');
                $abc->admission = $details->admission_for;

                array_push($lead_details, $abc);
            }
        }
        return collect($lead_details);
    }

    public function headings(): array
    {
        return ["Lead ID", "Student Name", "Student Contact Number", "Date of Transfer", "Admission"];
    }
}
