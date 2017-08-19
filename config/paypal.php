<?php

/**
 * Paypal Config
 */

return [

    'webhook_key' => env('PAYPAL_WEBHOOK_KEY', ''),

    'client_id' => env('PAYPAL_CLIENT_ID'),
    'secret' => env('PAYPAL_CLIENT_SECRET'),
    'url' => [
        'cancel' => env('PAYPAL_CANCEL_URL', 'https://loxcloud.com/user/pay'),
        'return' => env('PAYPAL_RETURN_URL', 'https://loxcloud.com/user/pay'),
        'webhook' => env('PAYPAL_WEBHOOK_URL', ''),
    ],
    'currency' => env('PAYPAL_CURRENCY', 'USD'),
    /*
     * SDK configuration
     */
    'settings' => [
        /*
         * Available option 'sandbox' or 'live'
         */
        'mode' => env('PAYPAL_MODE', 'live'),

        /*
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /*
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /*
         * Specify the file that want to write on
         */
        // 'log.FileName' => storage_path('logs/paypal-runtime.log'),

        /*
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE',
    ],
];
