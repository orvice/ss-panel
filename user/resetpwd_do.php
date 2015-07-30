<?php
require_once '../lib/config.php';
if (!empty($_GET)) {
    $code = $_GET['code'];
    $uid  = $_GET['uid'];
}
$smarty->assign('code',$code);
$smarty->assign('uid',$uid);
$smarty->display('user/resetpwd_do.tpl')
?>
