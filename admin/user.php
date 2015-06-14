<?php
require_once '_main.php';
$Users = new Ss\User\User();
$us = $Users->AllUser();
$smarty->assign('us',$us);
$smarty->display('admin/user.tpl');
?>