<?php
require_once '_main.php';
$ssmin = new \Ss\Etc\Ana();

// $smarty->assign('ssmin',$ssmin);
$smarty->assign('time',date("Y-m-d H:i",time())); // 当前时间
$smarty->assign('GetTrafficGB',$ssmin->GetTrafficGB()); // 已经产生流量
$smarty->assign('user_all_count',$ssmin->user_all_count()); // 注册用户
$smarty->assign('user_active_count',$ssmin->user_active_count()); // 已经有n个用户使用了服务
$smarty->assign('CheckInUser',$ssmin->CheckInUser(time())); // 签到用户
$smarty->assign('CheckInUser24',$ssmin->CheckInUser(3600*24)); // 24小时签到用户
$smarty->assign('user_time_count_1_h',$ssmin->user_time_count(3600)); // 过去1小时在线人数
$smarty->assign('user_time_count_5_i',$ssmin->user_time_count(300)); // 过去5分钟在线人数
$smarty->assign('user_time_count_1_i',$ssmin->user_time_count(60)); // 过去1分钟在线人数
$smarty->assign('user_time_count',$ssmin->user_time_count(10)); // 实时在线人数
$smarty->assign('user_time_count_24_h',$ssmin->user_time_count(3600*24)); // 过去24小时在线人数
$smarty->display('user/sys.tpl')
?>