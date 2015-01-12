<?php
//一些常用函数

//获取最后一个用户的port
function get_last_port(){
    global $dbc;
    $sql = "SELECT * FROM `user` ORDER BY UID DESC LIMIT 1";
    $query = $dbc->query($sql);
    $rs = $query->fetch_array();
    return $rs['port'];
}

//Gravatar
function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
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
