<?php


namespace App\Providers;

use App\Services\Auth\TokenStorage;
use Pongtan\Contracts\ServiceProviderInterface;

class TokenStorageServiceProvider implements ServiceProviderInterface
{

    public function register()
    {
        app()->singleton('token-storage', function () {
            return new TokenStorage(app()->make('cache'));
        });
    }

    public function boot()
    {
    }


}