<?php


namespace App\Providers;

use App\Services\Auth\TokenStorage;
use Pongtan\Contracts\ServiceProviderInterface;
use App\Contracts\TokenStorageInterface;

class TokenStorageServiceProvider implements ServiceProviderInterface
{

    public function register()
    {
        app()->singleton(TokenStorageInterface::class, function () {
            return new TokenStorage(app()->make('cache'));
        });
    }

    public function boot()
    {
    }


}