<?php
/* 防签到系统平台 处理 */
//开启session
session_start();
//获取POST的ua,然后判断是否相等。
if ($_SERVER['HTTP_USER_AGENT'].$_SESSION['js_ua_rand']==$_POST['ua']) {
    $_SESSION['assp']=true;
}
?>
