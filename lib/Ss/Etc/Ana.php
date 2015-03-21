<?php


namespace Ss\Etc;


class Ana extends Db {

    //获取本月流量
    function get_month_traffic(){
        $u = $this->db->sum("user","u");
        $d = $this->db->sum("user","d");
        $traffic = $u+$d;
        return $traffic;
    }

    function GetTrafficGB(){
        global $togb;
        $mt = $this->get_month_traffic();
        $mt = $mt/$togb;
        $mt = round($mt,3);
        return $mt;
    }

    //统计用户
    function user_all_count(){
        $c = $this->db->count("user","uid");
        return $c;
    }

    //有效用户统计
    function user_active_count(){
        $c = $this->db->count("user","uid",[
            "t[>]" => "0"
        ]);
        return $c;
    }

    //签到用户
    function CheckInUser(){
        $c = $this->db->count("user","uid",[
            "last_check_in_time[>]" => "0"
        ]);
        return $c;
    }

    //过去一段时间内的在线人数
    function user_time_count($time){
        $now = time();
        $time = $now-$time;
        $c = $this->db->count("user","uid",[
            "t[>]" => $time
        ]);
        return $c;
    }

    function node_count(){
        $c = $this->db->count("ss_node","id");
        return $c;
    }
}