<?php
require_once 'lib/config.php';
$c = new \Ss\User\Invite();
$smarty->assign('c',$c);
$datas = $c->CodeArray();
$smarty->assign('datas',$datas);
$smarty->assign('a',$a=1);
$smarty->display('code.tpl');
?>