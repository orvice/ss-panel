<?php

namespace App\Services;

use App\Services\Auth\Cookie,App\Services\Auth\Redis,App\Services\Auth\JwtToken;
use App\Services\Auth\File;


class Auth
{
   protected  $driver;

   public function __construct(){

   }

    /**
     * @return Cookie|Redis
     */
   private static  function getDriver(){
       $method = Config::get('authDriver');
       switch($method){
           case 'cookie':
               return new Cookie();
           case 'redis':
               return new Redis();
           case 'jwt':
               return new JwtToken();
       }
       return new Redis();
   }

   public static function login($uid,$time){
       self::getDriver()->login($uid,$time);
   }

   public static function getUser(){
       return self::getDriver()->getUser();
   }

   public static function logout(){
       self::getDriver()->logout();
   }
}