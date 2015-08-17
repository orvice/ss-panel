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
$smarty->assign('id',$id);
$smarty->assign('server',$server);
$smarty->assign('method',$method);
$smarty->assign('pass',$pass);
$smarty->assign('port',$port);
$smarty->display('user/node_json.tpl');
?>