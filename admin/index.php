<?php
require_once '_main.php';
$ssmin = new \Ss\Etc\Ana();
$mt = $ssmin->get_month_traffic();
$mt = $mt/$togb;
$mt = round($mt,3);
$active_user = $ssmin->user_active_count();
$all_user    = $ssmin->user_all_count();
$node_count  = $ssmin->node_count();
$smarty->assign('active_user',$active_user);
$smarty->assign('all_user',$all_user);
$smarty->assign('node_count',$node_count);
$smarty->display('admin/index.tpl');
?>