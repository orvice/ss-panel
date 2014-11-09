<?php
/**
 * class invite_code
 */

class invite_code {

    public $code;

    function  __construct($code){
        $this->code = $code;
    }

    //邀请码是否有效检测
    function invite_code_test(){
        global $dbc;
        $sql = "SELECT * FROM `invite_code` WHERE  `code` = '$this->code' ";
        $query = $dbc->query($sql);
        $rs = $query->fetch_array();
        if(empty($rs)){
            return 0;
        }else{
            return 1;
        }
    }

    //删除邀请码
    function invite_code_del(){
        global $dbc;
        $sql = "DELETE FROM `invite_code` WHERE `code` ='$this->code' ";
        $query = $dbc->query($sql);
        return $query;
    }
}