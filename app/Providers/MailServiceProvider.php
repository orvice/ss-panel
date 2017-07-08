<?php


namespace App\Providers;

use Pongtan\Contracts\ServiceProviderInterface;
use App\Contracts\MailService;
use App\Services\Mail\Mailgun;

class MailServiceProvider implements ServiceProviderInterface
{
    public function register()
    {
        app()->singleton(MailService::class, function ($app) {
            // @todo
            return new Mailgun();
        });
    }

    public function boot()
    {
    }
}