<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('course')->insert([
            [
                'id' => 1,
                'course_code' => 'PHP01',
                'course_name' => 'PHP',
                'course_unit' => '5',
                'no_of_seats' => 10,
                'created_at' => '2022-02-10 17:23:28',
                'updates_at' => null
            ],
            [
                'id' => 2,
                'course_code' => 'C001',
                'course_name' => 'C++',
                'course_unit' => '12',
                'no_of_seats' => 25,
                'created_at' => '2022-02-11 00:52:46',
                'updates_at' => '11-02-2022 06:23:06 AM'
            ]
        ])
    }
}
