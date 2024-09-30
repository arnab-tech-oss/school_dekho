<?php

namespace App\Exports;

use App\Models\StudentWebEnquiry;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WebsiteQueryExport implements FromCollection,WithHeadings
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
       $from =$this->request->from_date;
       $to=$this->request->to_date;
       $student_queries = StudentWebEnquiry::whereBetween('created_at',[$from,$to])
                                             ->select('name','contact','pincode','city')
                                             ->get(); 
       return collect($student_queries);
    }
    public function headings(): array
    {
        return ["Name", "Contact Number", "Pincode" ,"City"];
    }
}
