<?php
//引入配置文件
require_once 'user_check.php';
include_once 'lib/header.inc.php';
$id = $_GET['id'];
$n = new node($id);
$query = $n->del();
echo ' <script>alert("删除成功!")</script> ';
echo " <script>window.location='node.php';</script> " ;