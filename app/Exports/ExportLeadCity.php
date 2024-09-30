<?php

namespace App\Exports;

use App\Models\Lead;
use App\Models\SchoolLead;
use App\Models\SchoolContact;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportLeadCity implements FromCollection,WithHeadings
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

        $school_ids = SchoolContact::where('city', $this->request->city)
            ->select('school_id')
            ->get();

        $lead_collection = [];

        foreach ($school_ids as $key => $value) {

            $lead_ids = SchoolLead::where('school_id', $value->school_id)
                ->select('lead_id')
                ->get();
            
            $lead_collection = array_merge($lead_collection, $lead_ids->toArray());
        }

    
        foreach ($lead_collection as $leads) {
            
            $output[] = Lead::where('id', $leads["lead_id"])
                            ->select('student_name','student_contact1', 'admission_for','application')
                            ->get();
        }
        
        // dd($output);
        return collect($output);
    }

    public function headings(): array
    {
        return ["Name", "Contact Number", "Admission Class", "Application"];
    }
}
