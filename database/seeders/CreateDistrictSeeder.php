<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $district = [
            [
               'district'=>'Purba Medinipur',
            ],
            [
                'district'=>'North 24 Parganas',
            ],
            [
                'district'=>'Howrah',
            ],
            [
                'district'=>'Hooghly',
            ],
            [
                'district'=>'Darjeeling',
            ],
            [
                'district'=>'Paschim Medinipur',
            ],
            [
                'district'=>'South 24 Parganas',
            ],
            [
                'district'=>'Bardhaman',
            ],
            [
                'district'=>'Nadia',
            ],
            [
                'district'=>'Cooch Behar',
            ],
            [
                'district'=>'Dakshin Dinajpur',
            ],
            [
                'district'=>'Jalpaiguri',
            ],
            [
                'district'=>'Bankura',
            ],
            [
                'district'=>'Birbhum',
            ],
            [
                'district'=>'Murshidabad',
            ],
            [
                'district'=>'Purulia',
            ],
            [
                'district'=>'Maldah',
            ],
            [
                'district'=>'Uttar Dinajpur',
            ],

        ];
  
        foreach ($district as $key => $value) {
            District::create($value);
        }
    }
}
