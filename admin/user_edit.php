<?php
require_once '_main.php';

if(!empty($_GET)){
    //获取id
    $uid = $_GET['uid'];
    $u = new \Ss\User\UserInfo($uid);
    $rs = $u->UserArray();
}
$smarty->assign('uid',$uid);
$smarty->assign('rs',$rs);
$smarty->display('admin/user_edit.tpl');
?>