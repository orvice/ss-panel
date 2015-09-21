<?php
require_once '_main.php';
//引入防签到系统
require_once 'assp.php';

//获得流量信息
if($oo->get_transfer()<1000000)
{
    $transfers=0;}else{ $transfers = $oo->get_transfer();

}
//计算流量并保留2位小数
$all_transfer = $oo->get_transfer_enable()/$togb;
$unused_transfer =  $oo->unused_transfer()/$togb;
@$used_100 = $oo->get_transfer()/$oo->get_transfer_enable();
$used_100 = round($used_100,2);
$used_100 = $used_100*100;
//计算流量并保留2位小数
$transfers = $transfers/$tomb;
$transfers = round($transfers,2);
$all_transfer = round($all_transfer,2);
$unused_transfer = round($unused_transfer,2);
//最后在线时间
$unix_time = $oo->get_last_unix_time();

$smarty->assign('oo',$oo);
$smarty->assign('transfers',$transfers);
$smarty->assign('used_100',$used_100);
$smarty->assign('all_transfer',$all_transfer);
$smarty->assign('unused_transfer',$unused_transfer);
$smarty->assign('unix_time',$unix_time);
$smarty->assign("user_index_Announcement",Ss\ac::get('user_index_Announcement',get_defined_vars()));// 用户中心公告内容
$smarty->display('user/index.tpl');
echo  $js_ua_code;//显示防签到系统平台 页面内容
?>