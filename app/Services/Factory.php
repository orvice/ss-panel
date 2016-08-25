<?php

namespace App\Services;

use App\Services\Token\DB;
use App\Services\Token\Dynamodb;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;

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

    /**
     * @return Translator
     */
    public static function getLang()
    {
        $lang = Config::get('lang');
        if (!$lang) {
            $lang = 'en';
        }
        // Prepare the FileLoader
        $loader = new FileLoader(new Filesystem(), BASE_PATH . '/resources/lang/');
        // Register the English translator
        $trans = new Translator($loader, $lang);
        return $trans;
    }
}