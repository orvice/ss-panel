<?php
require_once '_main.php'; 
$smarty->assign('GetUserName',$U->GetUserName());
$smarty->assign('user_email',$user_email);
$smarty->assign('get_plan',$oo->get_plan());
$smarty->assign('get_money',$oo->get_money());
$smarty->display('admin/my.tpl');
?>
