<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Categories;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        $categories = Categories::all();
        View::share('categories', $categories);
        // Paginator::useBootstrap();
    }
    
}
