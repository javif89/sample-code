<?php

namespace App\Providers;

use App\Listeners\PromotionListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Auth\Events\Login;
use App\Listeners\UserLoginListener;
use App\Events\ProductModified;
use App\Events\ProductCountryChanged;
use App\Events\PromotionCreated;
use App\Events\PromotionDeleted;
use App\Events\PromotionSaved;
use App\Listeners\ProductListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        Login::class => [
            UserLoginListener::class
        ],
        ProductModified::class => [
            ProductListener::class,
        ],
        ProductCountryChanged::class => [
            ProductListener::class,
        ],
        PromotionCreated::class => [
            PromotionListener::class,
        ],
        PromotionSaved::class => [
            PromotionListener::class,
        ],
        PromotionDeleted::class => [
            PromotionListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
