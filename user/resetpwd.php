<?php
require_once '../lib/config.php';
if (count($_GET)!=null) {
    $code = $_GET['code'];
    $uid  = $_GET['uid'];
	$smarty->assign('code',$code);
	$smarty->assign('uid',$uid);
}
$smarty->display('user/resetpwd.tpl');
?>
