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
    $url = 'http://gravatar.duoshuo.com/avatar/';
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

//获取随机字符串
function get_random_char( $length = 8 ) {
    // 密码字符集，可任意添加你需要的字符
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $char = '';
    for ( $i = 0; $i < $length; $i++ )
    {
        $char .= $chars[ mt_rand(0, strlen($chars) - 1) ];
    }
    return $char;
}
