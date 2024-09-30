<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = [
            [
               'city'=>'Kolkata',
            ],
            [
                'city'=>'Delhi',
            ],
            [
                'city'=>'Hyderbad',
            ],
            [
                'city'=>'Mubai',
            ],
            [
                'city'=>'Hyderbad',
            ],
            [
                'city'=>'Pune',
            ],
            [
                'city'=>'Asansol',
            ],
            [
                'city'=>'Siliguri',
            ],
            [
                'city'=>'Durgapur',
            ],
            [
                'city'=>'Bardhaman',
            ],
            [
                'city'=>'Malda',
            ],
            [
                'city'=>'Baharampur',
            ],
            [
                'city'=>'Habra',
            ],
            [
                'city'=>'Kharagpur',
            ],
            [
                'city'=>'Shantipur',
            ],
            [
                'city'=>'Dankuni',
            ],
            [
                'city'=>'Ranaghat',
            ],

        ];
  
        foreach ($city as $key => $value) {
            City::create($value);
        }
    }
}
