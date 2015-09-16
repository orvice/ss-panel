<?php
/* 防签到系统平台 处理 */
//开启session
session_start();
//获取POST的uaid,然后判断是否相等。
if (base64_encode($_SESSION['js_ua_id'])==$_POST['uaid']) {
    $_SESSION['assp']=true;
}
?>
