<?php

if (!function_exists('conf')) {
    function conf($key)
    {
        // @todo
        // Query from cache and db
        return config($key);
    }
}

if (!function_exists('db_config')) {
    function db_config($key, $default = null)
    {
        return app()->make(\App\Services\Config\DbConfig::class)->get($key, $default);
    }
}


if (!function_exists('user')) {

    /**
     * @return \App\Models\User
     */
    function user()
    {
        return \App\Services\Auth\User::getUser();
    }

}

if (!function_exists('get_version')) {
    /**
     * @return string
     */
    function get_version()
    {
        // @todo
        return '4.0.0';
    }
}