<?php
include_once 'lib/config.php';
$pwd = $_GET['pwd'];
$p = \Ss\User\Comm::SsPW($pwd);
echo $p;