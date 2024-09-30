<?php

namespace App\Exports;

use App\Models\Lead;
use App\Models\AllLead;
use App\Models\SchoolLead;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Style;

use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class LeadExportSchool implements WithHeadings, WithColumnFormatting, WithMapping, ShouldAutoSize, FromCollection
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
        $leads = SchoolLead::where('school_id', $school_id)->whereBetween('created_at', [$from, $to])->get();
        $output = [];
        foreach ($leads as $lead) {
            $student_lead = Lead::where('id', $lead->lead_id)->select('student_name', 'student_contact1', 'admission_for', 'location', 'remarks', 'created_at')->get();
            if (sizeof($student_lead) > 0) {
                array_push($output, $student_lead);
            } else {
                $all_lead = AllLead::where('id', $lead->lead_id)->where('display',1)->select('name', 'phone', 'admission_for', 'location')->get();
                array_push($output, $all_lead);
            }
        }
        // dd($output);
        return collect($output);
    }

    public function map($data): array
    {
        if (in_array($data[0]->admission_for, [6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17])) {
            return [
                $data[0]->student_name,
                $data[0]->student_contact1,
                (int)$data[0]->admission_for - 5,
                $data[0]->remarks,
                $data[0]->location,
                $data[0]->created_at->format('d/m/Y'),
            ];
        } elseif ((int)$data[0]->admission_for == 5) {
            return [
                $data[0]->student_name,
                $data[0]->student_contact1,
                "KG",
                $data[0]->remarks,
                $data[0]->location,
                $data[0]->created_at->format('d/m/Y'),
            ];
        } elseif ((int)$data[0]->admission_for == 4) {
            return [
                $data[0]->student_name,
                $data[0]->student_contact1,
                "UKG",
                $data[0]->remarks,
                $data[0]->location,
                $data[0]->created_at->format('d/m/Y'),
            ];
        } elseif ((int)$data[0]->admission_for == 3) {
            return [
                $data[0]->student_name,
                $data[0]->student_contact1,
                "LKG",
                $data[0]->remarks,
                $data[0]->location,
                $data[0]->created_at->format('d/m/Y'),
            ];
        } elseif ((int)$data[0]->admission_for == 2) {
            return [
                $data[0]->student_name,
                $data[0]->student_contact1,
                "Nursery",
                $data[0]->remarks,
                $data[0]->location,
                $data[0]->created_at->format('d/m/Y'),
            ];
        } elseif ((int)$data[0]->admission_for == 1) {
            return [
                $data[0]->student_name,
                $data[0]->student_contact1,
                "Prenursery",
                $data[0]->remarks,
                $data[0]->location,
                $data[0]->created_at->format('d/m/Y'),
            ];
        } else {
        return [
            $data[0]->student_name,
            $data[0]->student_contact1,
            $data[0]->admission_for,
            $data[0]->remarks,
            $data[0]->location,
            $data[0]->created_at->format('d/m/Y'),
        ];
        }
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER,
            'B' => NumberFormat::FORMAT_NUMBER,
        ];
    }

    public function headings(): array
    {
        return ["Name", "Contact Number", "Admission For", "Remarks", "Location", "Date"];
    }
}
