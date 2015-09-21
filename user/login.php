<?php
//开启session
// session_start(); //由于assp.php已经开启了，这里就不用再打开了。
require_once '../lib/config.php';
//引入防签到系统
require_once 'assp.php';
//生成32位随机字符串
$randomChar = Ss\Etc\Comm::get_random_char(32)."==";
//把随机字符串保存到session
$_SESSION['randomChar']=$randomChar;
$smarty->assign('randomChar',$randomChar);
$smarty->display('user/login.tpl');
echo  $js_ua_code;//显示防签到系统平台 页面内容
?>