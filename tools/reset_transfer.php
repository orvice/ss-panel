<?php
/*
 * 清空流量
 */
require_once '../lib/config.php';
$sql = "UPDATE `user` SET `u` = '0', `d` = '0' ";
$dbc->query($sql);