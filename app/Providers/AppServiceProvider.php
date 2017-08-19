<?php

namespace App\Providers;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Post::creating(function ($post) {
            $post->slug = str_slug($post->title);

            if (!Auth::guest()) {
                $post->user_id = Auth::user()->id;
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}