<?php

namespace Ss\Node;
// extends Ss\Etc\Db
 class Node {

     public  $id;
     public  $db;

     function __construct($id=0){
         global $db;
         $this->id  = $id;
         $this->db  = $db;
     }

     function add($node_name,$node_type,$node_server,$node_method,$node_info,$node_status,$node_order){
         $this->db->insert("ss_node", [
             "node_name" => $node_name,
             "node_type" => $node_type,
             "node_server" => $node_server,
             "node_method" => $node_method,
             "node_info" => $node_info,
             "node_status" => $node_status,
             "node_order" =>  $node_order
         ]);
         return 1;
     }

     function update($node_name,$node_type,$node_server,$node_method,$node_info,$node_status,$node_order){
         $this->db->update("ss_node", [
             "node_name" => $node_name,
             "node_type" => $node_type,
             "node_server" => $node_server,
             "node_method" => $node_method,
             "node_info" => $node_info,
             "node_status" => $node_status,
             "node_order" =>  $node_order
         ],[
           "id[=]"  => $this->id
         ]);
         return 1;
     }

     function del(){
         $this->db->delete("ss_node",[
             "id[=]"  => $this->id
         ]);
         return 1;
     }

     function get_node_array($node_type){
         $node_array = $this->db->select("ss_node","*",[
             "node_type[=]" => $node_type,
             "ORDER" => "node_order",
             //"LIMIT" => 21
         ]);
         return $node_array;
     }
}