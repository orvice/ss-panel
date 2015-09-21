<?php
//开启session
session_start();
require_once '_main.php';
if(!empty($_GET)){
    //获取id
    $uid = $_GET['uid'];
    $u = new \Ss\User\UserInfo($uid);
    $rs = $u->UserArray();
}

//生成32位随机字符串
$randomChar = Ss\Etc\Comm::get_random_char(32)."==";
//把随机字符串保存到session
$_SESSION['randomChar']=$randomChar;
$smarty->assign('randomChar',$randomChar);
$smarty->assign('uid',$uid);
$smarty->assign('rs',$rs);
$smarty->display('admin/user_edit.tpl');
?>