<?php

namespace App\Exports;

use App\Models\Lead;
use App\Models\SchoolLead;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportLeads implements FromCollection, WithHeadings 
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

        if ($this->request->school_id == "all_schools") {
            $output = Lead::select('student_name', 'student_contact1', 'admission_for')
                ->whereBetween('created_at', [$from, $to])
                ->get();
            return collect($output);
        } else {
            $school_leads = SchoolLead::where('school_id', $this->request->school_id)
                ->select('lead_id')
                ->get();

            foreach ($school_leads as $lead_id) {
                $output[] = Lead::whereBetween('created_at', [$from, $to])
                    ->where('id', $lead_id->lead_id)
                    ->select('student_name', 'student_contact1', 'admission_for', 'application')
                    ->get();
            }
            return collect($output);
        }
    }

    public function headings(): array
    {
        return ["Name", "Contact Number", "Admission Class", "Application"];
    }
}
