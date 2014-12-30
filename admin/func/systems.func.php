<?php
//系统相关函数

//获取最新版本，返回版本号
function get_last_version(){
    //临时的获取版本地址
    $url = "http://img.orx.me/bootdown/version.php";
    $curl   = curl_init($url);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    $json = curl_exec($curl);
    curl_close($curl);
    $ary  = json_decode($json,true);
    $bk     = $ary['last_version'];
    return $bk;

}