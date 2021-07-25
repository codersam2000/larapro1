<?php

namespace App\Providers;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //alert components for all page 
        //Blade::component('alert-msg',Alert::class);
        
        //pagination
        View::share('pagination', Post::orderby('id','desc')->paginate(7));
        
        //categoris for all page
        View::share('categories', Category::where('status','active')->get());
        
        //latest post for all page
        View::share('latest_posts',Post::where('status','active')->latest()->take(3)->get());
    }
}
