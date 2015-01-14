<?php
//引入配置文件
require_once 'user_check.php';
//include_once 'lib/header.inc.php';
$id = $_GET['id'];
$sql ="SELECT * FROM `ss_node` WHERE `id` = '$id'  ";
$query =  $dbc->query($sql);
$rs = $query->fetch_array();
$server =  $rs['node_server'];
$method = $rs['node_method'];
$pass = $oo->get_pass();
$port = $oo->get_port();
?>
{
"server":"<?php echo $server; ?>",
"server_port":<?php echo $port; ?>,
"local_port":1080,
"password":"<?php echo $pass; ?>",
"timeout":600,
"method":"<?php echo $method; ?>"
}




