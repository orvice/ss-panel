<?php

namespace App\Services;

use App\Services\Config\DbConfig;

class Config
{
    public static function get($key)
    {
        $dc = new DbConfig();
        return $dc->get($key);
    }
}