<?php
require_once '../lib/config.php';
if (!empty($_GET)) {
    $code = $_GET['code'];
    $uid  = $_GET['uid'];
}
$smarty->display('user/resetpwd.tpl');
?>
