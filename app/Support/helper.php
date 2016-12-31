<?php

if (!function_exists('conf')) {
    function conf($key)
    {
        return config($key);
    }
}