<?php
/**
 * User Shadowsocks  info Class
 */

class ss {
    //
    public  $uid;
    private $dbc;

    function  __construct($uid=0){
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

    //get last check in time
    function get_last_check_in_time(){
        $sql = "SELECT * FROM `user` WHERE uid = '$this->uid'";
        $query = $this->dbc->query($sql);
        if(!$query){
            return 0;
        }else{
            $rs = $query->fetch_array();
            return $rs['last_check_in_time'];
        }
    }

    //check is able to check in
    function is_able_to_check_in(){
        global $tomb;
        $now = time();
        if( $now-$this->get_last_check_in_time() > 3600*24 ){
            return 1;
        }else{
            return 0;
        }
    }

    //update last check_in time
    function update_last_check_in_time(){
        $now = time();
        $sql = "UPDATE `user` SET `last_check_in_time` ='$now' WHERE `uid` =$this->uid ";
        $this->dbc->query($sql);
    }

    //add transfer 添加流量
    function  add_transfer($transfer=0){
        $transfer = $this->get_transfer_enable()+$transfer;
        $sql = "UPDATE  `user` SET `transfer_enable` = '$transfer' WHERE  `uid` = $this->uid  ";
        $this->dbc->query($sql);
    }

    //add money
    function add_money($uid,$money){
        $money = $this->get_money()+$money;
        $sql = "UPDATE  `user` SET `money` = '$money' WHERE  `uid` ='$uid' ";
        $query = $this->dbc->query($sql);
    }

    //update ss pass
    function update_ss_pass($pass){
        //$sql = "UPDATE `user` SET `passwd` = '$pass' WHERE `uid` = '$this->uid'";
        //$query = $this->dbc->query($sql);
        $transfer = $this->get_transfer_enable();
        $sql0 = "UPDATE  `user` SET `transfer_enable` = '-9999' WHERE  `uid` = '$this->uid'";
        $sql1 = "UPDATE  `user` SET `transfer_enable` = '$transfer' WHERE  `uid` = '$this->uid'";
        $this->dbc->query($sql0);
        sleep(15);
        $this->dbc->query($sql1);
        $sql2 = "UPDATE `user` SET `passwd` = '$pass' WHERE `uid` = '$this->uid'";
        $query = $this->dbc->query($sql2);
    }

} 
