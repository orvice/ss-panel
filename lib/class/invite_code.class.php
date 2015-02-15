<?php
/**
 * class invite_code
 */

class invite_code {

    public $code;
    private $dbc;
    private $db;

    function  __construct($code=0){
        global $dbc;
        global $db;
        $this->code = $code;
        $this->dbc  = $dbc;
        $this->db   = $db;
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
        $sql = "DELETE FROM `invite_code` WHERE `code` ='$this->code' LIMIT 1 ";
        $query = $this->dbc->query($sql);
        return $query;
    }

    function add_code($sub,$user,$num){
        for($a=0;$a<$num;$a++) {
            $x = rand(10, 1000);
            $z = rand(10, 1000);
            $x = md5($x).md5($z);
            $x = base64_encode($x);
            $code = $sub.substr($x, rand(1, 13), 24);
            $sql = "INSERT INTO `invite_code` (`id`, `code`, `user`) VALUES (NULL, '$code', '$user')";
            $this->dbc->query($sql);
        }
    }

    function get_code_array($user,$num){
        $array = $this->db->select("invite_code","*",
            [
                "user[=]" => $user,
                "LIMIT" => $num
            ]);
        return $array;
    }

}