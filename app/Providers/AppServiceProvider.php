<?php

namespace App\Providers;

use App\CountryContext;
use Illuminate\Support\Facades\View;
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
        $this->app->bind('CountryContext', function ($app) {
            return new CountryContext($app);
        });


        View::share('countryContext', app('CountryContext'));
    }
}
