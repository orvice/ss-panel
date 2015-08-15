<?php
//引入配置文件
require_once '../lib/config.php';
require_once '_check.php';
$id = $_GET['id'];
$node = new \Ss\Node\NodeInfo($id);
$node->Del();
echo ' <script>alert("删除成功!")</script> ';
echo " <script>window.location='node.php';</script> " ;