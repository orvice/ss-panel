<?php

namespace App\Services\Config;

interface ModelConfigInterface
{
    public function get($key);

    public function set($key, $value);
}
