<?php
/**
 * 付款表
 * //状态码 0 未支付 1 已经支付
 */

class trade {

    private $dbc;
    public $uic;

    function __construct($uid=0){
        global $dbc;
        $this->dbc = $dbc;
        $this->uid = $uid;
    }

    //新充值订单
    function new_trade($trade_num,$money){
        $sql = "INSERT INTO `ss_trade_no` (`trade_id`, `trade_num`, `user_uid`, `money`, `status`)
                VALUES (NULL, '$trade_num', '$this->uid', '$money', '0')";
        $query = $this->dbc->query($sql);
    }

    //状态更新
    function update_trade($trade_num,$status){
        $sql = "UPDATE  `ss_trade_no` SET `status` = '$status'
                WHERE  `trade_num` ='$trade_num'";
        $query = $this->dbc->query($sql);
    }

    //get uid
    function get_uid($trade_num){
        $sql = "SELECT * FROM `ss_trade_no` WHERE `trade_num` ='$trade_num'";
        $query = $this->dbc->query($sql);
        $rs = $query->fetch_array();
        return $rs['user_uid'];
    }

    //get money
    function get_money($trade_num){
        $sql = "SELECT * FROM `ss_trade_no` WHERE `trade_num` ='$trade_num'";
        $query = $this->dbc->query($sql);
        $rs = $query->fetch_array();
        return $rs['money'];
    }
} 