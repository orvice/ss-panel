<?php
/**
 * SS  统计
 */

class ssmin {

    private $dbc;

    function  __construct(){
        global $dbc;
        $this->dbc = $dbc;
    }

    //获取本月流量
    function get_month_traffic(){
        $sql = "SELECT SUM(u) as \"u\" FROM `user`";
        $query = $this->dbc->query($sql);
        $rs = $query->fetch_array();
        $u = $rs['u'];

        $sql = "SELECT SUM(d) as \"d\" FROM `user`";
        $query = $this->dbc->query($sql);
        $rs = $query->fetch_array();
        $d = $rs['d'];

        $traffic = $u+$d;
        return $traffic;
    }

    //统计用户
    function user_all_count(){
        $sql = "SELECT COUNT(uid) FROM `user` ";
        $query = $this->dbc->query($sql);
        $row = $query->fetch_array();
        return $row[0];
    }

    //有效用户统计
    function user_active_count(){
        $sql = "SELECT COUNT(uid) FROM `user` WHERE `t` > 0";
        $query = $this->dbc->query($sql);
        $row = $query->fetch_array();
        return $row[0];
    }

    //过去一段时间内的在线人数
    function user_time_count($time){
        $now = time();
        $time = $now-$time;
        $sql = "SELECT COUNT(uid) FROM `user` WHERE `t` >$time ";
        $query = $this->dbc->query($sql);
        $row = $query->fetch_array();
        return $row[0];
    }

    function node_count(){
        $sql = "SELECT COUNT(id) FROM `ss_node` ";
        $query = $this->dbc->query($sql);
        $row = $query->fetch_array();
        return $row[0];
    }
}