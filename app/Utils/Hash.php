<?php

namespace App\Utils;


class Hash
{
     public static function passwordHash($str){
          return md5($str);
     }

     public static function cookieHash(){

     }
}