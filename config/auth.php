<?php

/**
 * Auth Config
 */

return [
    'email_verify_enabled' => env('APP_EmailVerifyEnabled', false),
    'is_enable_google_login' => env('AUTH_IS_ENABLE_GOOGLE_LOGIN', false),
    'is_enable_facebook_login' => env('AUTH_IS_ENABLE_FACEBOOK_LOGIN', false),
];
