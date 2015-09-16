<?php
//开启session
session_start();
require_once '../lib/config.php';
//引入生成随机字符串类
require_once '../lib/Ss/AES/randomchar.php';
if (count($_GET)!=null) {
    $code = $_GET['code'];
    $uid  = $_GET['uid'];
	$smarty->assign('code',$code);
	$smarty->assign('uid',$uid);
}
//生成32位随机字符串
$randomChar = RandomChar::getRandomChar(32)."==";
//把随机字符串保存到session
$_SESSION['randomChar']=$randomChar;
$smarty->assign('randomChar',$randomChar);
$smarty->display('user/resetpwd_do.tpl')
?>