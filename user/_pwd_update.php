<?php
//开启session
session_start();
require_once '../lib/config.php';
require_once '_check.php';
//引入AES
require_once '../lib/Ss/AES/aes.class.php';
require_once '../lib/Ss/AES/aesctr.class.php';

$nowpwd = AesCtr::decrypt($_POST['nowpwd'], $_SESSION['randomChar'], 256);
$pwd = AesCtr::decrypt($_POST['pwd'], $_SESSION['randomChar'], 256);
$repwd = AesCtr::decrypt($_POST['repwd'], $_SESSION['randomChar'], 256);

$nowpwd = \Ss\User\Comm::SsPW($nowpwd);
if($U->GetPasswd() != $nowpwd) {
    $a['error'] = '1';
    $a['msg'] = "密码错误";
}elseif($pwd != $repwd){
    $a['error'] = '1';
    $a['msg'] = "两次密码输入不同";
}elseif(strlen($pwd)<8){
    $a['error'] = '1';
    $a['msg'] = "密码太短啦";
}else{
    $a['ok'] = '1';
    $a['msg'] = "修改成功";
    $pwd = \Ss\User\Comm::SsPW($pwd);
    $U->UpdatePwd($pwd);
}

echo json_encode($a,JSON_UNESCAPED_UNICODE);