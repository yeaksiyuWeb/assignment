<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Course::create([
            'course_code' => 'PHP01',
            'course_name' => 'PHP',
            'course_unit' => '5',
            'no_of_seats' => 10,
        ]);

        Course::create([
            'course_code' => 'C001',
            'course_name' => 'C++',
            'course_unit' => '12',
            'no_of_seats' => 25,
        ]);
    }
}
