<?php

namespace Ss\User;


class Comm {

    //pwd on cookies
    static function CoPW($pw){
        global $salt;
        //$x =  base64_encode($pw.$salt);
        $x =  hash('sha256',$pw.$salt);
        $x = substr($x,5,45);
        return $x;
    }

    //pwd on db
    static function SsPW($pwd){
        global $salt;
        global $pwd_mode;
        switch ($pwd_mode){
            case 1 :
                return md5($pwd);
                break;
            case 2 :
                return hash('sha256',$pwd.$salt);
                break;
            default:
                return hash('sha256',$pwd.$salt);
        }
    }

    static function md5WithSaltPw($pwd){
        global $salt;
        return md5($pwd.$salt);
    }

    //Gravatar
    static function Gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
        //$url = 'http://gravatar.duoshuo.com/avatar/';
        $url = 'https://secure.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }



}