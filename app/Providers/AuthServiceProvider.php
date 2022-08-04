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
        Gate::define('isClient', function (User $user) {
            return $user->role ==='client';
        });
        Gate::define('isAdmin', function (User $user) {
            return $user->role ==='admin';
        });

        Gate::define('isMentor', function (User $user) {
            return $user->role ==='mentor';
        });

        Gate::define('canUpdatePass', function (User $user,User $userPass) {
            error_log('GATE canUpdatePass called');
            if($user->id ===$userPass->id or $user->role === 'admin'){
                return true;
            }
        });
    }
}
