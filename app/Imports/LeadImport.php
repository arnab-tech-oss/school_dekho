<?php

namespace App\Imports;

use App\Models\AllLead;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LeadImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $exists = AllLead::where('phone', $row['phone'])->get();
        if (sizeof($exists) == 0) {
            return new AllLead([
                'name' => $row['name'],
                'location' => $row['location'],
                'pincode' => $row['pincode'],
                'email' => $row['email'],
                'board' => $row['board'],
                'phone' => $row['phone'],
                'parent_name' => $row['parent_name'],
                'admission_for' => $row['admission_for'],
                'remarks' => "New Data",
                'status' => 0,
            ]);
        }
    }
}
