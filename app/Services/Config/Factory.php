<?php

namespace App\Services\Config;

class Factory
{
    /**
     * @return ModelConfigInterface
     */
    public static function newMysqlConfig()
    {
        return new MysqlConfig();
    }
}
