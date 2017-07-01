<?php

namespace App\Providers;

use App\Services\Config\DbConfig;
use Pongtan\Contracts\ServiceProviderInterface;

class DbConfigServiceProvider implements ServiceProviderInterface
{
    public function register()
    {
        app()->singleton(DbConfig::class, function ($app) {
            return new DbConfig();
        });
    }

    public function boot()
    {
    }
}
