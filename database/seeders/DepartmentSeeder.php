<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Department::create([
            'department' => 'IT'
        ]);

        Department::create([
            'department' => 'HR'
        ]);

    }
}
