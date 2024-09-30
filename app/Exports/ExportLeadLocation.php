<?php

namespace App\Exports;

use App\Models\AllLead;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportLeadLocation implements FromCollection, WithHeadings
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
        $from = $this->request->form_date;
        $to = $this->request->to_date;
        $location = $this->request->location;
        $output = AllLead::where('location', $location)->where('display',1)->whereBetween('created_at', [$from, $to])->select('name', 'location', 'location_for_school', 'pincode', 'board', 'phone')->get();
        return collect($output);
    }
    public function headings(): array
    {
        return ["Name", "Location", "Location For School", "Pincode", "Board", "Phone"];
    }
}
