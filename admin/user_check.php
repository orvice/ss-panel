<?php
require_once '../lib/config.php';
require_once '../lib/func/comm.func.php';
require_once '../lib/func/admin.func.php';
require_once '../lib/class/user.class.php';
require_once '../lib/class/node.class.php';
require_once '../lib/class/invite_code.class.php';
//检测是否登录，若没登录则转向登录界面
if(!isset($_COOKIE['admin_name'])||!isset($_COOKIE['admin_uid'])||!isset($_COOKIE['admin_pwd'])){
    header("Location:login.php");
    exit();
}else{
    //co
    $uid = $_COOKIE['admin_uid'];
    $admin_name = $_COOKIE['admin_name'];
    $admin_pwd  = $_COOKIE['admin_pwd'];
    $admin_email = get_user_email($uid);

    //验证cookie
    $pw = get_user_pass($uid);
    $pw = co_pw($pw);
    if($pw != $admin_pwd){
        header("Location:login.php");
    }
}

//admin config

$admin_title = "管理中心";
