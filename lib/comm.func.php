<?php
//一些常用函数

//或者最后一个用户的port
function get_last_port(){
    global $dbc;
    $sql = "SELECT * FROM `user` ORDER BY UID DESC LIMIT 1";
    $query = $dbc->query($sql);
    $rs = $query->fetch_array();
    return $rs['port'];
}