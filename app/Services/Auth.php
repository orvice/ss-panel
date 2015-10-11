<?php

namespace App\Services;

use App\Services\Auth\Cookie;
use App\Services\Auth\Redis;
use App\Services\Auth\File;

class Auth
{
   protected static $driver;

   public function __construct(){
       self::$driver = Config::get('authDriver');
   }

   public static function getDriver(){
       return Config::get('authDriver');
   }

   public static function login($uid,$time){
        switch(self::getDriver()){
            case 'cookie':
                Cookie::login($uid,$time);
        }
   }

   public static function getUser(){
       switch(self::getDriver()){
           case 'cookie':
              return Cookie::getUser();
       }
   }

   public static function logout(){
       switch(self::getDriver()){
           case 'cookie':
               Cookie::logout();
       }
   }
}