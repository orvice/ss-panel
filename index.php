<?php
include_once 'lib/config.php';
$smarty->assign('ana',file_get_contents("ana.php")); //读取统计代码
$smarty->display("index.tpl");
?>

