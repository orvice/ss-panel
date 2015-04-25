<?php


namespace Ss\Node;


class NodeInfo extends \Ss\Etc\Db {

    private $table = "ss_node";

    function NodeArray(){
        $datas = $this->db->select($this->table,"*",[
            "id" => $this->id,
            "LIMIT" => "1"
        ]);
        return $datas['0'];
    }

    function Server(){
        return $this->NodeArray()['node_server'];
    }

    function Method(){
        return $this->NodeArray()['node_method'];
    }

}