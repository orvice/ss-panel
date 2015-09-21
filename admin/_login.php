<?php
//开启session
session_start();
require_once '../lib/config.php';
//引入AES
require_once '../lib/Ss/AES/aes.class.php';
require_once '../lib/Ss/AES/aesctr.class.php';
$email = $_POST['email'];
$email = strtolower($email);
$passwd = AesCtr::decrypt($_POST['passwd'], $_SESSION['randomChar'], 256);
$passwd = \Ss\User\Comm::SsPW($passwd);
$rem = $_POST['remember_me'];
$c = new \Ss\User\UserCheck();
$q = new \Ss\User\Query();
if($c->EmailLogin($email,$passwd)){
    $rs['code'] = '1';
    $rs['ok'] = '1';
    $rs['msg'] = "欢迎回来";
    //login success
    if($rem= "week"){
        $ext = 3600*24*7;
    }else{
        $ext = 3600;
    }
    //获取用户id
    $id = $q->GetUidByEmail($email);
    //处理密码
    $pw = \Ss\User\Comm::CoPW($passwd);
    setcookie("user_pwd",$pw,time()+$ext);
    setcookie("uid",$id,time()+$ext);
    setcookie("user_email",$email,time()+$ext);
}else{
    $rs['code'] = '0';
    $rs['msg'] = "邮箱或者密码错误";
}
echo json_encode($rs,JSON_UNESCAPED_UNICODE);
?>