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
            'course_code' => 'PP01',
            'course_name' => 'Python Programming',
            'course_unit' => '5',
            'no_of_seats' => 10,
        ]);

        Course::create([
            'course_code' => 'AI01',
            'course_name' => 'AI Machine Learning',
            'course_unit' => '12',
            'no_of_seats' => 25,
        ]);

        Course::create([
            'course_code' => 'DM01',
            'course_name' => 'Digital Marketing',
            'course_unit' => '15',
            'no_of_seats' => 25,
        ]);

        Course::create([
            'course_code' => 'FA01',
            'course_name' => 'Financial Accounting',
            'course_unit' => '10',
            'no_of_seats' => 25,
        ]);
    }
}
