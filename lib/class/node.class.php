<?php

 class node {

     public  $id;
     private $dbc;
     private $db;

     function __construct($id=0){
         global $dbc;
         global $db;
         $this->id  = $id;
         $this->dbc = $dbc;
         $this->db  = $db;
     }

     function add($node_name,$node_type,$node_server,$node_method,$node_info,$node_status,$node_order){
         $sql = "INSERT INTO  `ss_node` (`id`, `node_name`, `node_type`, `node_server`, `node_method`, `node_info`, `node_status`, `node_order`)
            VALUES (NULL, '$node_name', '$node_type', '$node_server', '$node_method', '$node_info', '$node_status', '$node_order')";
         $query = $this->dbc->query($sql);
         return $query;
     }
     function update($node_name,$node_type,$node_server,$node_method,$node_info,$node_status,$node_order){
         $sql = " UPDATE `ss_node` SET
                  `node_name` = '$node_name',
                  `node_type` = '$node_type',
                  `node_server` = '$node_server',
                  `node_method` = '$node_method',
                  `node_info` = '$node_info',
                  `node_status` = '$node_status',
                  `node_order` = '$node_order'
                  WHERE  `id` = '$this->id' ";
         $query = $this->dbc->query($sql);
         return $query;
     }

     function del(){
         $sql = "DELETE FROM `ss_node` WHERE `id` = $this->id ";
         $query = $this->dbc->query($sql);
         return $query;
     }

     function get_node_array($node_type){
         $node_array = $this->db->select("ss_node","*",[
             "node_type[=]" => $node_type,
             //"LIMIT" => 21
         ]);
         return $node_array;
     }
}