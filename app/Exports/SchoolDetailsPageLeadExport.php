<?php

namespace App\Exports;

use App\Models\SchoolPageLead;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use stdClass;

class SchoolDetailsPageLeadExport implements FromCollection,WithHeadings
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
        $leads = [];
        if ($school_id == "all") {
            $school_details_page_leads = SchoolPageLead::with('school.school_address.states')->whereBetween('created_at', [$from, $to])->get();
            
        }else{
            $school_details_page_leads = SchoolPageLead::with('school.school_address.states')->whereBetween('created_at', [$from, $to])->where('school_id', $school_id)->get();
        }

        foreach($school_details_page_leads as $lead){
            $x = new stdClass();
            $x->name = $lead->name;
            $x->phone = $lead->phone;
            $x->class_seeking = $lead->class_seeking; 
           
            $x->school = $lead->school->name;
            $x->school_address = $lead->school->school_address[0]->address;
            $x->pincode = $lead->school->school_address[0]->pincode;
            $x->state = $lead->school->school_address[0]->states->state;
            $x->district = $lead->school->school_address[0]->districts->district;
            $x->date = date("Y-m-d ", strtotime($lead->created_at));
            array_push($leads,$x);
        }
        return collect($leads);
    }
    public function headings(): array
    {
        return ["Name", "Phone","Class Seeking","School Name","School Address","Pincode","State","District","Date"];
    }
}
