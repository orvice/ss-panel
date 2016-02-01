<?php

namespace App\Services;

use App\Services\Auth\Cookie;
use App\Services\Auth\Redis;
use App\Services\Auth\File;

class Auth
{
   protected  $driver;

   public function __construct(){

   }

   public static  function getDriver(){

       $method = Config::get('authDriver');

       switch($method){
           case 'cookie':
               return new Cookie();
               break;
           case 'redis':
               return new Redis();
               break;
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