<?php


namespace App\Providers;

use App\Services\Auth;
use Pongtan\Contracts\ServiceProviderInterface;

class AuthServiceProvider implements ServiceProviderInterface
{

    public function register()
    {
        app()->singleton('auth', function () {
            return new Auth(app()->make('cache'));
        });
    }

    public function boot()
    {
    }


}