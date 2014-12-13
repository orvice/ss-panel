<?php
include_once '../../lib/config.php';
include_once 'admin.func.php';
include_once '../../lib/func/pw.func.php';

$admin_name = $_COOKIE['admin_name'];
$admin_id   = $_COOKIE['admin_id'];
$admin_pwd  = $_COOKIE['admin_pwd'];
//检测cookie中pw是否正确
//从数据库中取值
$pwd = get_admin_pwd($admin_id);
$pwd = co_pw($pwd);

echo $pwd;