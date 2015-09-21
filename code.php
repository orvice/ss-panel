<?php
require_once 'lib/config.php';
$c = new \Ss\User\Invite();
$smarty->assign('c',$c);
$datas = $c->CodeArray();
$smarty->assign('datas',$datas);
$smarty->assign('a',$a=1);
$smarty->assign("code_Announcement",Ss\ac::get('code_Announcement',get_defined_vars()));// 邀请码公告内容
$smarty->display('code.tpl');
?>