<?php
session_start();
$sessionId = session_id();
require_once '../lib/config.php';
require_once '../lib/comm.func.php';
require_once '../lib/user.func.php';
require_once '../lib/ss.class.php';
//检测是否登录，若没登录则转向登录界面
if(!isset($_COOKIE['user_name'])||!isset($_COOKIE['user_uid'])||!isset($_COOKIE['user_pwd'])){
    header("Location:../login.php");
    exit();
}else{
    //co
    $uid = $_COOKIE['user_uid'];
    $user_name = $_COOKIE['user_name'];
    $user_pwd  = $_COOKIE['user_pwd'];
    $user_email = get_user_email($uid);

    //验证cookie
    $pw = get_user_pass($uid);
    $pw = co_pw($pw);
    if($pw != $user_pwd){
        header("Location:../login.php");
    }
}
$oo = new ss($uid);