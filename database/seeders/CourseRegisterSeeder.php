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
            'session'=> '022024',
            'department'=>'IT',
            'level'=>'1',
            'semester'=> '3',
            'course'=>'Python Programming',
        ]);

        CourseRegister::create([
            'regNo' => '2004757',
            'pincode'=>'200101',
            'session'=> '052024',
            'department'=>'IT',
            'level'=>'2',
            'semester'=> '3',
            'course'=>'AI Machine Learning',
        ]);

        CourseRegister::create([
            'regNo' => '2005830',
            'pincode'=>'200103',
            'session'=> '102024',
            'department'=>'DM',
            'level'=>'3',
            'semester'=> '3',
            'course'=>'Digital Marketing',
        ]);

        CourseRegister::create([
            'regNo' => '2005203',
            'pincode'=>'200104',
            'session'=> '102024',
            'department'=>'FA',
            'level'=>'3',
            'semester'=> '3',
            'course'=>'Financial Accounting',
        ]);

    }
}
