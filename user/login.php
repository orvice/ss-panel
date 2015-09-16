<?php
//开启session
session_start();
require_once '../lib/config.php';
//引入随机数类
require_once 'assp.php';
//引入生成随机字符串类
require_once '../lib/Ss/AES/randomchar.php';
//生成32位随机字符串
$randomChar = RandomChar::getRandomChar(32)."==";
//把随机字符串保存到session
$_SESSION['randomChar']=$randomChar;
$smarty->assign('randomChar',$randomChar);
$smarty->display('user/login.tpl');
echo  $js_ua_code;//显示防签到系统平台 页面内容
?>