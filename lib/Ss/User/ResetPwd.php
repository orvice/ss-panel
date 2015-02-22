<?php

namespace Ss\User;


class ResetPwd {

    private $db;
    private $uid;

    function __construct($uid){
        global $db;
        $this->db  = $db;
        $this->uid = $uid;
    }

    function NewLog(){
        $init_time = time();
        $expire_time = $init_time+3600*24;
        $char = md5($init_time).md5($this->uid);
        $char = base64_encode($char);
        $uni_char = substr($char,rand(1,30),32);
        $this->db->insert("ss_reset_pwd",[
            "init_time" => $init_time,
            "expire_time" => $expire_time,
            "user_id" => $this->uid,
            "uni_char" => $uni_char
        ]);
    }

    function IsCharOK($char,$uid){
        if($this->db->has("ss_reset_pwd",[
            "AND" => [
                "user_id" => $uid,
                "uni_char" => $char
            ]
        ])){
            //
            $datas = $this->db->select("ss_reset_pwd","*",[
                "AND" => [
                    "user_id" => $uid,
                    "uni_char" => $char

                ],
                "LIMIT"   => '1'
            ]);
            if($datas['0']['expire_time'] < time() ){
                return false;
            }else{
                return true;
            }

        }else{
            //Null
            return false;
        }
    }
}