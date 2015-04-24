<?php

namespace Ss\User;


class Comm {

    //pwd on cookies
    static function CoPW($pw){
        $x =  base64_encode($pw);
        $x = substr($x,6,12);
        return $x;
    }

    //pwd on db
    static function SsPW($pwd){
        $pwd = md5($pwd);
        return $pwd;
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