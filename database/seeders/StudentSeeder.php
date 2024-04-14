<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'regNo' => '2005232',
            'password'=> bcrypt('Test@123'),
            'studentName'=>'Ooi Chi Zhe',
            'pincode'=>'200100',
            'session_id'=> '',
            'department_id'=>'',
            'semester_id'=>'',
            'cgpa'=>'4.0',
        ]);

        Student::create([
            'regNo' => '2004757',
            'password'=> bcrypt('Test@123'),
            'studentName'=>'Koh Wei Zhe',
            'pincode'=>'200101',
            'session_id'=> '',
            'department_id'=>'',
            'semester_id'=>'',
            'cgpa'=>'4.0',
        ]);

        Student::create([
            'regNo' => '2005830',
            'password'=> bcrypt('Test@123'),
            'studentName'=>'Yeak Si Yu',
            'pincode'=>'200103',
            'session_id'=> '',
            'department_id'=>'',
            'semester_id'=>'',
            'cgpa'=>'4.0',
        ]);

        Student::create([
            'regNo' => '2005203',
            'password'=> bcrypt('Test@123'),
            'studentName'=>'Agnes Tan Sze Wei',
            'pincode'=>'200104',
            'session_id'=> '',
            'department_id'=>'',
            'semester_id'=>'',
            'cgpa'=>'4.0',
        ]);

    }
}
