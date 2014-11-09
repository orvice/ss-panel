<?php
/*
 * 清空流量
 */
require_once '../lib/config.php';
require_once '../lib/comm.func.php';
require_once '../lib/user.func.php';
require_once '../lib/reg.func.php';
require_once '../lib/invite_code.class.php';

$sql = "UPDATE `user` SET `u` = '0', `d` = '0' ";
$dbc->query($sql);