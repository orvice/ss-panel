<?php
//引入配置文件
require_once 'user_check.php';
include_once 'lib/header.inc.php';
include_once '../lib/class/user_invite.class.php';
//实例化一个user_invite
$uinvite = new user_invite($uid);

if($uinvite->get_code_num() == 0 ){
    echo " <script>window.location='invite.php';</script> " ;
}else{
    $num = $uinvite->get_code_num();
    $uinvite->add_code($num);
    $uinvite->clear_code();
    echo " <script>window.location='invite.php';</script> " ;
}