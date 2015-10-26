<?php


namespace App\Utils;


class Helper
{
    public static function redirect($url){
        echo '<script type="text/javascript">
           window.location = ".$url."
      </script>';
    }
}