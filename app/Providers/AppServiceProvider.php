<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Policies\PostPolicy; 
use App\Post; 

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [ 
        Post::class => PostPolicy::class, 
    ]; 
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
