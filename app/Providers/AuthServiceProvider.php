<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        Auth::extend('doctrine', function ($app) {
            return new \LaravelDoctrine\ORM\Auth\DoctrineUserProvider(
                $app['auth']->createUserProvider('users')['config'],
                $app['hash'],
                $app['config']['auth.providers.users.model']
            );
        });
    }
}
