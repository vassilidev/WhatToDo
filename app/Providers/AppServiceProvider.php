<?php

namespace App\Providers;

use Cookie;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);

        view()->composer('layouts.dashboard', function ($view) {
            $theme = \Cookie::get('theme');
            if ($theme != 'dark' && $theme != 'light') {
                $theme = 'light';
            }

            $view->with('theme', $theme);
        });
    }
}
