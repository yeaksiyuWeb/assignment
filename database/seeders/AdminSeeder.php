<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin')->insert([
            [
                'id' => 1,
                'username' => 'admin',
                'password' => 12345,
                'created_at' => '2022-01-31 16:21:18',
                'updated_at' => '2022-01-31 16:21:18'
            ]
        ])
    }
}
