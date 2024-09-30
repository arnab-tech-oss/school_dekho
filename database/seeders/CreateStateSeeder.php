<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state=[
            ['state'=>'ANDAMAN AND NICOBAR ISLANDS'],
            ['state'=>'ANDHRA PRADESH'],
            ['state'=>'ARUNACHAL PRADESH'],
            ['state'=>'ASSAM'],
            ['state'=>'BIHAR'],
            ['state'=>'CHATTISGARH'],
            ['state'=>'CHANDIGARH'],
            ['state'=>'DAMAN AND DIU'],
            ['state'=>'DELHI'],
            ['state'=>'DADRA AND NAGAR HAVELI'],
            ['state'=>'GOA'],
            ['state'=>'GUJARAT'],
            ['state'=>'HIMACHAL PRADESH'],
            ['state'=>'HARYANA'],
            ['state'=>'JAMMU AND KASHMIR'],
            ['state'=>'JHARKHAND'],
            ['state'=>'KERALA'],
            ['state'=>'KARNATAKA'],
            ['state'=>'LAKSHADWEEP'],
            ['state'=>'MEGHALAYA'],
            ['state'=>'MAHARASHTRA'],
            ['state'=>'MANIPUR'],
            ['state'=>'MADHYA PRADESH'],
            ['state'=>'	MIZORAM'],
            ['state'=>'NAGALAND'],
            ['state'=>'ORISSA'],
            ['state'=>'PUNJAB'],
            ['state'=>'PONDICHERRY'],
            ['state'=>'RAJASTHAN'],
            ['state'=>'SIKKIM'],
            ['state'=>'TAMIL NADU'],
            ['state'=>'TRIPURA'],
            ['state'=>'UTTARAKHAND'],
            ['state'=>'UTTAR PRADESH'],
            ['state'=>'WEST BENGAL'],
            ['state'=>'TELANGANA'],
        ];
        foreach ($state as $key => $value) {
            State::create($value);
        }
    }
}
