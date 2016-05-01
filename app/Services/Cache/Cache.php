<?php

namespace App\Services\Cache;


abstract class Cache
{
    abstract function set($key,$value,$ttl);
    abstract function del($key);
    abstract function get($key);
}