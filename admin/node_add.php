<?php
require_once '_main.php';

if(!empty($_POST)){
    $node_name     = $_POST['node_name'];
    $node_type     = $_POST['node_type'];
    $node_server   = $_POST['node_server'];
    $node_method   = $_POST['node_method'];
    $node_info     = $_POST['node_info'];
    $node_status   = $_POST['node_status'];
    $node_order    = $_POST['node_order'];

    $node = new Ss\Node\Node();
    $query = $node->Add($node_name,$node_type,$node_server,$node_method,$node_info,$node_status,$node_order);
    if($query){
        echo ' <script>alert("添加成功!")</script> ';
        echo " <script>window.location='node.php';</script> " ;
    }
}
$smarty->display('admin/node_add.tpl');
?>