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

    /**
     * @return User|void
     */
   public static function getUser(){
       if (Helper::isTesting()) {
           $user =  User::first();
           $user->isLogin = true;
           return $user;
       }
       return self::getDriver()->getUser();
   }

   public static function logout(){
       self::getDriver()->logout();
   }
}