<?php
/**
 * Created by PhpStorm.
 * User: charley
 * Date: 2017/7/17
 * Time: am 12:43
 */

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