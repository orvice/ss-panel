<?php
require_once '_main.php';

// $invite = new \Ss\User\Invite($uid);
// $code = $invite->CodeArray();
// $smarty->assign('code',$code);
$smarty->display('admin/invite.tpl');
?>