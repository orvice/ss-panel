<?php


namespace Ss\User;


class Reg {

    private $db;

    function __construct(){
        global $db;
        $this->db = $db;
    }

    //获取最后一个用户的port
    function get_last_port(){
        global $dbc;
        $sql = "SELECT * FROM `user` ORDER BY UID DESC LIMIT 1";
        $query = $dbc->query($sql);
        $rs = $query->fetch_array();
        //return $rs['port'];
        $datas = $this->db->select("user","*",[
            "ORDER" => "UID DESC",
            "LIMIT" => 1
        ]);
        return $datas['0']['port'];
    }

}