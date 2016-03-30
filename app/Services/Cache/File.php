<?php


namespace App\Service\Cache;

use Desarrolla2\Cache\Cache;
use Desarrolla2\Cache\Adapter\File as FileCache;


class File
{

    public function __construct()
    {
        $cacheDir = '/tmp';
        $adapter = new File($cacheDir);
        $adapter->setOption('ttl', 3600);
        $cache = new Cache($adapter);
    }
}