<?php
require_once '_main.php';
$node = new Ss\Node\Node();
$node0 = $node->NodesArray(0); // 普通节点数组
$node1 = $node->NodesArray(1); // Pro节点数组
$smarty->assign('node',$node);
$smarty->assign('node0',$node0);
$smarty->assign('node1',$node1);
$smarty->display('user/node.tpl');
?>
