<?php
session_start();

//注销登录
if($_GET['action'] == "logout"){
    setcookie("admin_name", "", time()-3600);
    setcookie("admin_pwd", "", time()-3600);
    setcookie("admin_uid", "", time()-3600);
    header("Location:index.php");
    exit;
}
