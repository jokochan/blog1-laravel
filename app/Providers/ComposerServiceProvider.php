<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Blog;
use View;

class ComposerServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
    {
        View::composer(['partials.meta_dynamic', 'layouts.nav'], function ($view) {
            // $view->with('blogs', Blog::all());
            $view->with('blogs', Blog::where('status', 1)->latest()->get());
        });
    }
}
