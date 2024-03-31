<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CourseRegister;

class CourseRegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseRegister::create([
            'regNo' => '2005232',
            'pincode'=>'200100',
            'session'=> 'Feb 2024',
            'department'=>'IT',
            'level'=>'1',
            'semester'=> '3',
            'course'=>'AWAD',
        ]);

        CourseRegister::create([
            'regNo' => '2005232',
            'pincode'=>'200100',
            'session'=> 'May 2024',
            'department'=>'IT',
            'level'=>'2',
            'semester'=> '3',
            'course'=>'SE',
        ]);

        CourseRegister::create([
            'regNo' => '2005232',
            'pincode'=>'200100',
            'session'=> 'Oct 2024',
            'department'=>'IT',
            'level'=>'3',
            'semester'=> '3',
            'course'=>'SQA',
        ]);

    }
}
