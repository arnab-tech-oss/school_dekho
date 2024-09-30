<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Student_query;

class StudentsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection 
    */
    public function collection()
    {
        return Student_query::with('user','profile', 'school')->latest()->get();
    }

    public function map($student_query): array
    {
        return [
            $Student_query->user->name,
            $Student_query->profile->name,
            $Student_query->school->name,
        ];
    }
}
