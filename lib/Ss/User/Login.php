<?php

namespace Ss\User;


class Login {

    static function Check(){
        if(!isset($_COOKIE['user_name'])||!isset($_COOKIE['user_uid'])||!isset($_COOKIE['user_pwd'])){
            header("Location:login.php");
            // return false;
        }else{
            $uid = $_COOKIE['user_uid'];
        }
    }
}