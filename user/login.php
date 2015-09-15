<?php
require_once '../lib/config.php';
require_once 'assp.php';
$smarty->display('user/login.tpl');
echo  $js_ua_code;//显示防签到系统平台 页面内容
?>
