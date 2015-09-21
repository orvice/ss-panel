<?php
require_once '_main.php';
$n = new \Ss\Node\Node();
$node = $n->AllNode();

$smarty->assign('node',$node);
$smarty->display('admin/node.tpl');
?>