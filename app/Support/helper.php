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
        return app()->make('auth')->getUser([]);
    }

}