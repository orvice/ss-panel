<?php
require_once '../lib/config.php';
require_once '_check.php';
session_start();
//加入防签到系统平台，如果不是在用户中心点的签到都不会奖励流量。
if($_SESSION['assp']==false){
    $a['code'] = '0';
    $a['msg'] = "非法访问";
}
//权限检查
elseif(!$oo->is_able_to_check_in()){
    $transfer_to_add = 0;
}else {
    if ($oo->unused_transfer() < 2048 * $tomb) {
        $transfer_to_add = rand(1024, 2048);
    } else {
        $transfer_to_add = rand($check_min, $check_max);
    }
    $oo->add_transfer($transfer_to_add*$tomb);
    $oo->update_last_check_in_time();
    $a['msg'] = "获得了".$transfer_to_add."MB流量";
}

echo json_encode($a,JSON_UNESCAPED_UNICODE);
