<?php
//设置编码
header("content-type:text/html;charset=utf-8");
require_once '../lib/config.php';
require_once '_check.php';
$id = $_GET['id'];
$node = new \Ss\Node\NodeInfo($id);
$server =  $node->Server();
$method = $node->Method();
$pass = $oo->get_pass();
$port = $oo->get_port();
$ssurl =  $method.":".$pass."@".$server.":".$port;
$ssqr = "ss://".base64_encode($ssurl);
$smarty->assign('oo',$oo);
$smarty->assign('id',$id);
$smarty->assign('ssurl',$ssurl);
$smarty->assign('ssqr',$ssqr);
$smarty->display('user/node_qr.tpl');
?>