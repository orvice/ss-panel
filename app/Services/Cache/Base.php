<?php

namespace App\Service\Cache;


abstract class Base
{
    abstract function set();
    abstract function get();
}