<?php
require_once '../lib/config.php';
require_once '_check.php';

$nowpwd = $_POST['nowpwd'];
$pwd = $_POST['pwd'];
$repwd = $_POST['repwd'];

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
//echo
echo json_encode($a);