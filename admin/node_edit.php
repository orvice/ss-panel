<?php
require_once '_main.php';

//更新
if(!empty($_POST)){
    $node_id       = $_POST['node_id'];
    $node_name     = $_POST['node_name'];
    $node_type     = $_POST['node_type'];
    $node_server   = $_POST['node_server'];
    $node_method   = $_POST['node_method'];
    $node_info     = $_POST['node_info'];
    $node_status   = $_POST['node_status'];
    $node_order    = $_POST['node_order'];
    $node = new \Ss\Node\NodeInfo($node_id);
    $query = $node->Update($node_name,$node_type,$node_server,$node_method,$node_info,$node_status,$node_order);
    if($query){
        echo ' <script>alert("更新成功!")</script> ';
        echo " <script>window.location='node.php';</script> " ;
    }
}

if(!empty($_GET)){
    //获取id
    $id = $_GET['id'];
    $node = new \Ss\Node\NodeInfo($id);
    $rs = $node->NodeArray();
}
$smarty->assign('id',$id);
$smarty->assign('rs',$rs);
$smarty->display('admin/node_edit.tpl');
?>