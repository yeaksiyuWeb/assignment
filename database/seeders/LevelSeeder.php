<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'level' => '1'
        ]);

        Level::create([
            'level' => '2'
        ]);

        Level::create([
            'level' => '3'
        ]);
    }
}
