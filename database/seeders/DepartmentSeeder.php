<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert pre-deparment data into 'department' table
        DB::table('department')->insert([
            ['id' => 1, 'department_name' => 'IT', 'created_at' => '2022-02-10 17:23:04'],
            ['id' => 2, 'department_name' => 'HR', 'created_at' => '2022-02-10 17:23:09'],
        ]);
    }
}
