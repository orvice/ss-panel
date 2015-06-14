<?php
require_once 'lib/config.php';
$c = new \Ss\User\Invite();
$smarty->assign('c',$c);
$smarty->assign('ana',file_get_contents("ana.php")); //读取统计代码
$datas = $c->CodeArray();
$smarty->assign('datas',$datas);
$smarty->assign('a',$a=1);
$smarty->display('code.tpl');
?>