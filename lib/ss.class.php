<?php
/**
 * Shadowsocks Class
 */

class ss {
    //
    public  $uid;

    function  __construct($uid){
        $this->uid = $uid;
    }

    //返回端口号
    function  get_port(){
        global $dbc;
        $sql = "SELECT * FROM `user` WHERE uid = '$this->uid'";
        $query = $dbc->query($sql);
        if(!$query){
            return 0;
        }else{
            $rs = $query->fetch_array();
            return $rs['port'];
        }
    }

    //获取流量
    function get_transfer(){
        global $dbc;
        $sql = "SELECT * FROM `user` WHERE uid = '$this->uid'";
        $query = $dbc->query($sql);
        if(!$query){
            return 0;
        }else{
            $rs = $query->fetch_array();
            return $rs['u']+$rs['d'];
        }

    }

    //返回密码
    function  get_pass(){
        global $dbc;
        $sql = "SELECT * FROM `user` WHERE uid = '$this->uid'";
        $query = $dbc->query($sql);
        if(!$query){
            return 0;
        }else{
            $rs = $query->fetch_array();
            return $rs['passwd'];
        }
    }

    //返回Plan
    function  get_plan(){
        global $dbc;
        $sql = "SELECT * FROM `user` WHERE uid = '$this->uid'";
        $query = $dbc->query($sql);
        if(!$query){
            return 0;
        }else{
            $rs = $query->fetch_array();
            return $rs['plan'];
        }
    }

    //返回transfer_enable
    function  get_transfer_enable(){
        global $dbc;
        $sql = "SELECT * FROM `user` WHERE uid = '$this->uid'";
        $query = $dbc->query($sql);
        if(!$query){
            return 0;
        }else{
            $rs = $query->fetch_array();
            return $rs['transfer_enable'];
        }
    }

    //get money
    function  get_money(){
        global $dbc;
        $sql = "SELECT * FROM `user` WHERE uid = '$this->uid'";
        $query = $dbc->query($sql);
        if(!$query){
            return 0;
        }else{
            $rs = $query->fetch_array();
            return $rs['money'];
        }
    }

    //get unused traffic
    function unused_transfer(){
        global $dbc;
        return $this->get_transfer_enable() - $this->get_transfer();
    }

    //get last time
    function get_last_unix_time(){
        global $dbc;
        $sql = "SELECT * FROM `user` WHERE uid = '$this->uid'";
        $query = $dbc->query($sql);
        if(!$query){
            return 0;
        }else{
            $rs = $query->fetch_array();
            return $rs['t'];
        }
    }

} 