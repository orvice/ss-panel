<?php


namespace App\Services\Factories;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

class Pay
{
    /**
     * @return ApiContext
     */
    public static function newPaypalClient()
    {
        $apiContext = new ApiContext(
            new OAuthTokenCredential(config('paypal.client_id'), config('paypal.secret'))
        );
        return $apiContext;
    }
}