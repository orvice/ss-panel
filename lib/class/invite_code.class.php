<?php
/**
 * class invite_code
 */

class invite_code {

    public $code;
    private $dbc;

    function  __construct($code){
        global $dbc;
        $this->code = $code;
        $this->dbc  = $dbc;
    }

    //邀请码是否有效检测
    function invite_code_test(){
        $sql = "SELECT * FROM `invite_code` WHERE  `code` = '$this->code' ";
        $query = $this->dbc->query($sql);
        $rs = $query->fetch_array();
        if(empty($rs)){
            return 0;
        }else{
            return 1;
        }
    }

    //删除邀请码
    function invite_code_del(){
        $query_sql = "SELECT * FROM `invite_code` WHERE `code` ='$this->code' LIMIT 1";
        $query = $this->dbc->query($query_sql);
        $rs = $query->fetch_array();
        $id = $rs['id'];
        $sql = "DELETE FROM `invite_code` WHERE `id` ='$id' ";
        $query = $this->dbc->query($sql);
        return $query;
    }
}