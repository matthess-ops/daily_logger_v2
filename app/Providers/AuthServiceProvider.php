<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Test;
use App\User;
use App\Policies\TestPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        // Test::class => TestPolicy::class,
        // '\Test'=> 'App\Policies\TestPolicy',
        // 'App\Test' => 'App\Policies\TestPolicy',


    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('test_clientindex', function (User $user) {
            return $user->role ==='client' or 'admin';
        });
        //
    }
}
