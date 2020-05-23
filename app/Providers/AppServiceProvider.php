<?php

namespace App\Providers;

use Carbon\Carbon;
use View;
use Auth;
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
        View::composer('*', function($view) {

            $view->with('today', Carbon::today()->format('Y-m-d'));

        });

        View::composer('*', function($view) {

            Auth::check() ? $view->with('loginUser', Auth::user()) : $view->with('loginUser', '');

        });
        
    }
}
