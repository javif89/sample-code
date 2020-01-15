<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('superadmin', function ($user) {
            return $user->is_super;
        });

        Gate::define('view-dashboard', function ($user) {
            return $user->is_super;
        });

        Gate::define('manage-events', function ($user) {
            return $user->is_super;
        });

        Gate::define('manage-customers', function ($user) {
            return $user->is_super;
        });

        Gate::define('manage-careers', function ($user) {
            return $user->is_super;
        });

        Gate::define('manage-locale', function ($user) {
            return $user->is_super;
        });

        Gate::define('manage-invites', function ($user) {
            return $user->is_super;
        });

        Gate::define('manage-products', function ($user) {
            return $user->is_super;
        });

        Gate::define('distributor', function ($user) {
            return $user->is_distributor;
        });

        Gate::define('csa', function ($user) {
            return $user->is_csa;
        });

        Gate::define('edit-articles', function ($user) {
            return $user->is_super;
        });
    }
}
