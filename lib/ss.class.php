<?php
/**
 * User Shadowsocks  info Class
 */

class ss {
    //
    public  $uid;
    private $dbc;

    function  __construct($uid){
        global $dbc;
        $this->uid = $uid;
        $this->dbc = $dbc;
    }

    //返回端口号
    function  get_port(){
        $sql = "SELECT * FROM `user` WHERE uid = '$this->uid'";
        $query = $this->dbc->query($sql);
        if(!$query){
            return 0;
        }else{
            $rs = $query->fetch_array();
            return $rs['port'];
        }
    }

    //获取流量
    function get_transfer(){
        $sql = "SELECT * FROM `user` WHERE uid = '$this->uid'";
        $query = $this->dbc->query($sql);
        if(!$query){
            return 0;
        }else{
            $rs = $query->fetch_array();
            return $rs['u']+$rs['d'];
        }

    }

    //返回密码
    function  get_pass(){
        $sql = "SELECT * FROM `user` WHERE uid = '$this->uid'";
        $query = $this->dbc->query($sql);
        if(!$query){
            return 0;
        }else{
            $rs = $query->fetch_array();
            return $rs['passwd'];
        }
    }

    //返回Plan
    function  get_plan(){
        $sql = "SELECT * FROM `user` WHERE uid = '$this->uid'";
        $query = $this->dbc->query($sql);
        if(!$query){
            return 0;
        }else{
            $rs = $query->fetch_array();
            return $rs['plan'];
        }
    }

    //返回transfer_enable
    function  get_transfer_enable(){
        $sql = "SELECT * FROM `user` WHERE uid = '$this->uid'";
        $query = $this->dbc->query($sql);
        if(!$query){
            return 0;
        }else{
            $rs = $query->fetch_array();
            return $rs['transfer_enable'];
        }
    }

    //get money
    function  get_money(){
        $sql = "SELECT * FROM `user` WHERE uid = '$this->uid'";
        $query = $this->dbc->query($sql);
        if(!$query){
            return 0;
        }else{
            $rs = $query->fetch_array();
            return $rs['money'];
        }
    }

    //get unused traffic
    function unused_transfer(){
        //global $dbc;
        return $this->get_transfer_enable() - $this->get_transfer();
    }

    //get last time
    function get_last_unix_time(){
        $sql = "SELECT * FROM `user` WHERE uid = '$this->uid'";
        $query = $this->dbc->query($sql);
        if(!$query){
            return 0;
        }else{
            $rs = $query->fetch_array();
            return $rs['t'];
        }
    }

    //add transfer
    function  add_transfer(){

    }

} 