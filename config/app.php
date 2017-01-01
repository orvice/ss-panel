<?php

/***
 * App Config
 */

return [
    'env' => env("APP_ENV", "prod"),
    'key' => env("APP_KEY", ''),
    'name' => env("APP_NAME", 'ss-panel 4'),
    'baseUrl' => env("APP_BASEURL", '/'),
    'timeZone' => env("APP_TIMEZONE", 'UTC'),  // UTC
    'theme' => env("APP_THEME", 'default'),
    'log_level' => env('APP_LOG_LEVEL', 'debug'),
    'lang' => env('APP_LANG', 'en'),


    'mu_key' => env("APP_MU_KEY"),

    'checkin_time' => env("APP_CHECKIN_TIME", 3600 * 24),

];
