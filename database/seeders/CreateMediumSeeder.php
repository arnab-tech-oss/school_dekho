<?php

namespace Database\Seeders;

use App\Models\SchoolMedium;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateMediumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medium=[
            ['medium'=>'English'],
            ['medium'=>'Hindi'],
            ['medium'=>'Bengali'],
        ];
        foreach ($medium as $key => $value) {
            SchoolMedium::create($value);
        }
    }
}
