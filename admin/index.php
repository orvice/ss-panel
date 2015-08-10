<?php
require_once '_main.php';
$ssmin = new \Ss\Etc\Ana();
$mt = $ssmin->getMonthTraffic();
$mt = $mt/$togb;
$mt = round($mt,3);
$active_user = $ssmin->activedUserCount();
$all_user = $ssmin->allUserCount();
$node_count = $ssmin->nodeCount();
$smarty->assign('active_user',$active_user);
$smarty->assign('all_user',$all_user);
$smarty->assign('node_count',$node_count);
$smarty->display('admin/index.tpl');
?>