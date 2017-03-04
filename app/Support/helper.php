<?php

if (!function_exists('conf')) {
    function conf($key)
    {
        return config($key);
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
        return VERSION;
    }
}