<?php
//开启session
session_start();
require_once '_main.php';
//引入生成随机字符串类
require_once '../lib/Ss/AES/randomchar.php';

if(!empty($_GET)){
    //获取id
    $uid = $_GET['uid'];
    $u = new \Ss\User\UserInfo($uid);
    $rs = $u->UserArray();
}

//生成32位随机字符串
$randomChar = RandomChar::getRandomChar(32)."==";
//把随机字符串保存到session
$_SESSION['randomChar']=$randomChar;
$smarty->assign('randomChar',$randomChar);
$smarty->assign('uid',$uid);
$smarty->assign('rs',$rs);
$smarty->display('admin/user_edit.tpl');
?>