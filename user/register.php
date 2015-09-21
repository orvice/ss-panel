<?php
//开启session
session_start();
require_once '../lib/config.php';
//生成32位随机字符串
$randomChar = Ss\Etc\Comm::get_random_char(32)."==";
//把随机字符串保存到session
$_SESSION['randomChar']=$randomChar;
$smarty->assign('randomChar',$randomChar);
$smarty->assign("tos_content",Ss\ac::get('tos_content',get_defined_vars()));// 用户协议 
$smarty->display('user/register.tpl');
?>