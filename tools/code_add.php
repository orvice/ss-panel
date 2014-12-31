<?php

require_once '../lib/config.php';
require_once '../lib/func/comm.func.php';
require_once '../lib/func/user.func.php';
require_once '../lib/func/reg.func.php';
require_once '../lib/class/invite_code.class.php';

$num = 10;
//$user = $_GET['user'];
$user = 0;
for($a=0;$a<=$num;$a++){
    echo $a."----";
    $x = rand(10,1000);
    $x = md5($x);
    $code = "00".substr($x,rand(1,13),14);
    echo $code."===by user".$user."</br>";
    $sql = "INSERT INTO `invite_code` (`id`, `code`, `user`) VALUES (NULL, '$code', '$user');";
    $dbc->query($sql);
}
