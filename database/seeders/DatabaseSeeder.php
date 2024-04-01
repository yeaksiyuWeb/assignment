<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(CourseRegisterSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(SessionSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(SemesterSeeder::class);
        
    }
}
