<?php

namespace App\Services;

use App\Services\Token\DB;
use App\Services\Token\Dynamodb;

class Factory
{


    public static function createMail()
    {

    }
    
    public static function createTokenStorage()
    {
        switch (Config::get('tokenDriver')) {
            case 'db':
                return new DB();
            case 'dynamodb':
                return new Dynamodb();
            default:
                return new DB();
        }
    }


}