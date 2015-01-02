<?php
//引入配置文件
require_once 'user_check.php';
include_once 'lib/header.inc.php';
$sub  = $_POST['code_sub'];
$type = $_POST['code_type'];
$num  = $_POST['code_num'];
$c = new invite_code();
$c->add_code($sub,$type,$num);
echo ' <script>alert("添加成功!")</script> ';
echo " <script>window.location='invite.php';</script> " ;