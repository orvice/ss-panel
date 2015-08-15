<?php
require_once '../lib/config.php';
require_once '_check.php';
$invite = new \Ss\User\Invite($uid);
if($U->InviteNum()==0){
    $a['msg'] = "出错了";
}elseif(time()-$U->RegDateUnixTime() < 3600*48 ){
    $a['msg'] = "注册48小时后才可以生成邀请码。";
}else{
    $invite->AddAllCode();
    $U->InviteNumToZero();
    $a['ok'] = "1";
    $a['msg'] = "Done";
}
echo json_encode($a);