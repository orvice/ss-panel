<?php

namespace App\Utils;

use App\Services\Config;

class Hash
{
     public static function passwordHash($str){
          return md5($str);
     }

     public static function cookieHash($str){
          return  substr(hash('sha256',$str.Config::get('key')),5,45);
     }
}