<?php
require_once '_main.php';
$ssmin = new \Ss\Etc\Ana();

// $smarty->assign('ssmin',$ssmin);
$smarty->assign('time',date("Y-m-d H:i",time())); // 当前时间
$smarty->assign('getTrafficGB',$ssmin->getTrafficGB()); // 已经产生流量
$smarty->assign('allUserCount',$ssmin->allUserCount()); // 注册用户
$smarty->assign('activedUserCount',$ssmin->activedUserCount()); // 已经有n个用户使用了服务
$smarty->assign('checkinUser',$ssmin->checkinUser(time())); // 签到用户
$smarty->assign('CheckInUser_24',$ssmin->CheckInUser(3600*24)); // 24小时签到用户
$smarty->assign('onlineUserCount_1_h',$ssmin->onlineUserCount(3600)); // 过去1小时在线人数
$smarty->assign('onlineUserCount_5_i',$ssmin->onlineUserCount(300)); // 过去5分钟在线人数
$smarty->assign('onlineUserCount_1_i',$ssmin->onlineUserCount(60)); // 过去1分钟在线人数
$smarty->assign('onlineUserCount',$ssmin->onlineUserCount(10)); // 实时在线人数
$smarty->assign('onlineUserCount_24_h',$ssmin->onlineUserCount(3600*24)); // 过去24小时在线人数
$smarty->display('user/sys.tpl')
?>