<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title' => 'title 1',
            'content'=> 'content 1',
            'regNo' => '2005232',
            'studName' => 'Student 1'
        ]);
        Post::create([
            'title' => 'title 2',
            'content'=> 'content 2',
            'regNo' => '2004757',
            'studName' => 'Student 2'
        ]);
        Post::create([
            'title' => 'title 3',
            'content'=> 'content 3',
            'regNo' => '2005203',
            'studName' => 'Student 3'
        ]);
        
    }
}
