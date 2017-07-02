<?php

namespace App\Services\Config;

interface ModelConfigInterface
{
    public function get($key,$default);

    public function set($key, $value);
}
