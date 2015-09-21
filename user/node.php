<?php
require_once '_main.php';
$node = new Ss\Node\Node();
$node0 = $node->NodesArray(0); // 普通节点数组
$node1 = $node->NodesArray(1); // Pro节点数组
$smarty->assign('oo',$oo);
$smarty->assign('node',$node);
$smarty->assign('node0',$node0);
$smarty->assign('node1',$node1);
$varsarray = get_defined_vars();
$smarty->assign("user_node_Announcement_node",Ss\ac::get('user_node_Announcement_node',$varsarray));// 普通节点公告内容
$smarty->assign("user_node_Announcement_node_pro",Ss\ac::get('user_node_Announcement_node_pro',$varsarray));// pro节点公告内容
$smarty->display('user/node.tpl');
?>