<?php
/**
 * User check
 */

namespace Ss\User;


class User_check {

    private $db;

    function __construct(){
        global $db;
        $this->db  = $db;
    }

    //is username used
    function is_username_used($username){
        if($this->db->has("user",[
            "user_name" => $username
        ])){
            //用户名不可用
            return 0;
        }else{
            //用户名可用
            return 1;
        }
    }

    //is email used
    function is_email_used($email){
        if($this->db->has("user",[
            "email" => $email
        ])){
            return 0;
        }else{
            return 1;
        }
    }

    //
    function is_email_legal($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }else{
            return false;
        }
    }
}