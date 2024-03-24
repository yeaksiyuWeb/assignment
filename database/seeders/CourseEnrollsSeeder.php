<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseEnrollsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert pre-courseenroll data into 'courseenrolls' table
        DB::table('courseenrolls')->insert([
            [
                'id' => 1,
                'student_reg_no' => '10806121',
                'pin_code' => '822894',
                'session' => 1,
                'department' => 1,
                'level' => 2,
                'semester' => 3,
                'course' => 1,
                'enroll_date' => '2022-02-11 00:59:33'
            ],
            [
                'id' => 2,
                'student_reg_no' => '10806121',
                'pin_code' => '822894',
                'session' => 1,
                'department' => 1,
                'level' => 1,
                'semester' => 2,
                'course' => 2,
                'enroll_date' => '2022-02-11 01:01:07'
            ],
        ]);
    }
}
