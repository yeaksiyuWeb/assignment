<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert pre-level data into 'level' table
        DB::table('level')->insert([
            ['id' => 1, 'level' => '1', 'created_at' => '2022-02-11 00:59:02'],
            ['id' => 2, 'level' => '2', 'created_at' => '2022-02-11 00:59:02'],
            ['id' => 3, 'level' => '3', 'created_at' => '2022-02-11 00:59:09'],
        ]);
    }
}
