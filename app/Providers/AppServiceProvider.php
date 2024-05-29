<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('FrontEnd.include.banner', function ($view) {
            $view->with('categories',Category::where('category_status',1)->get());
        });
        view()->composer('FrontEnd.include.dish', function ($view) {
            $view->with('categories',Category::where('category_status',1)->get());
        });
    }
}
