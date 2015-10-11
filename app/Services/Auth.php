<?php

namespace App\Services;

class Auth
{
   protected static $driver;

   public function __construct(){
       self::$driver = Config::get('authDriver');
   }

   public static function getDriver(){
       return Config::get('authDriver');
   }

   public static function login($uid){

   }

   public static function isLogin(){

   }

   public static function logout(){

   }
}