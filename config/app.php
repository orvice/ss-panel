<?php

/***
 * App Config
 */

return [
    'env' => env("APP_ENV", "prod"),
    'name' => env("APP_NAME", 'ss-panel 4'),
    'baseUrl' => env("APP_BASEURL", '/'),
    'timeZone' => env("APP_TIMEZONE", 'UTC'),  // UTC
    'theme' => env("APP_THEME", 'default'),
    'log_level' => env('APP_LOG_LEVEL', 'debug'),

    'email_verify_enabled' => env('APP_EmailVerifyEnabled',false),
];
