<?php

namespace App\Listeners;


use App\CountryContext;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Auth\Events\Login;

class UserLoginListener
{


    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        if (!empty($event->user->country_code)) {
            app('CountryContext')->set($event->user->country_code);
        }
    }
}