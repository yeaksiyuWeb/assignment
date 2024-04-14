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
            'title' => 'Introduction to Python Programming',
            'content'=> 'Join us for an immersive journey into the world of Python programming. Learn the fundamentals of Python syntax, data structures, and control flow. Perfect for beginners and those looking to refresh their skills.',
            'regNo' => '2005232',
            'author' => 'Ooi Chi Zhe'
        ]);
        Post::create([
            'title' => 'Introduction to Python Programming Course Registration Schedule',
            'content'=> 'Registration Opens: 1 April 2024 | Registration Closes: 31 May 2024',
            'regNo' => 'admin',
            'author' => 'Admin'
        ]);
        Post::create([
            'title' => 'Machine Learning Fundamentals Workshop',
            'content'=> 'Discover the basics of machine learning in this hands-on workshop. Explore popular algorithms such as linear regression and decision trees. Gain practical experience through interactive coding exercises.',
            'regNo' => '2004757',
            'author' => 'Koh Wei Zhe'
        ]);
        Post::create([
            'title' => 'Machine Learning Fundamentals Workshop Course Registration Schedule',
            'content'=> 'Registration Opens: 1 June 2024 | Registration Closes: 31 July 2024',
            'regNo' => 'admin',
            'author' => 'Admin'
        ]);
        Post::create([
            'title' => 'Digital Marketing Strategies Seminar',
            'content'=> 'Unlock the secrets of successful digital marketing campaigns. Explore techniques for search engine optimization (SEO), social media marketing, and content creation. Suitable for marketers of all levels',
            'regNo' => '2005203',
            'author' => 'Agnes Tan Sze Wei'
        ]);
        Post::create([
            'title' => 'Digital Marketing Strategies Seminar Course Registration Schedule',
            'content'=> 'Registration Opens: 1 August 2024 | Registration Closes: 30 September 2024',
            'regNo' => 'admin',
            'author' => 'Admin'
        ]);
        Post::create([
            'title' => 'Introduction to Financial Accounting',
            'content'=> 'Learn the essentials of financial accounting in this comprehensive course. Understand key concepts such as balance sheets, income statements, and cash flow analysis. No prior accounting knowledge required.',
            'regNo' => '2005830',
            'author' => 'Yeak Si Yu'
        ]);
        Post::create([
            'title' => 'Introduction to Financial Accounting Course Registration Schedule',
            'content'=> 'Registration Opens: 1 October 2024 | Registration Closes: 30 November 2024',
            'regNo' => 'admin',
            'author' => 'Admin'
        ]);

    }
}
