<?php

namespace App\Services;

use App\Models\User;
use App\Utils\Helper;

class Auth
{
   protected  $driver;

   public function __construct(){

   }

   private static  function getDriver(){
       return Factory::createAuth();
   }

   public static function login($uid,$time){
       self::getDriver()->login($uid,$time);
   }

   public static function getUser(){
       if (Helper::isTesting()) {
           return User::first();
       }
       return self::getDriver()->getUser();
   }

   public static function logout(){
       self::getDriver()->logout();
   }
}