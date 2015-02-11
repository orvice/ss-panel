<?php
//引入配置文件
require_once 'user_check.php';
include_once 'lib/header.inc.php';
$uid = $_GET['uid'];
$n = new user($uid);
$query = $n->del();
echo ' <script>alert("删除成功!")</script> ';
echo " <script>window.location='user.php';</script> " ;
