<?php
require_once '_main.php';
$invite = new \Ss\User\Invite($uid);
$code = $invite->CodeArray();
$smarty->assign('InviteNum',$U->InviteNum());
// $smarty->assign('data',$data);
$smarty->assign('code',$code);
$smarty->assign('a',$a=1);
$varsarray = get_defined_vars();
$smarty->assign("user_invite_Announcement_color_orange",Ss\ac::get('user_invite_Announcement_color_orange',$varsarray));// 橙色公告内容
$smarty->assign("user_invite_Announcement_color_blue",Ss\ac::get('user_invite_Announcement_color_blue',$varsarray));// 蓝色公告内容
$smarty->display('user/invite.tpl');
?>