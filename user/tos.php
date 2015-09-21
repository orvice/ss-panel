<?php
require_once '../lib/config.php';
$smarty->assign("tos_content",Ss\ac::get('tos_content',get_defined_vars()));// 用户协议 
$smarty->display('user/tos.tpl');
?>