<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Session;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Session::create([
            'session' => '022024'
        ]);

        Session::create([
            'session' => '052024'
        ]);

        Session::create([
            'session' => '102024'
        ]);
    }
}
