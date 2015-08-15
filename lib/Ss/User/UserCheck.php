<?php
/**
 * User check
 */

namespace Ss\User;


class UserCheck {

    private $db;

    function __construct(){
        global $db;
        $this->db  = $db;
    }

    //is username used
    function IsUsernameUsed($username){
        if($this->db->has("user",[
            "user_name" => $username
        ])){
            return 1;
        }else{
            return 0;
        }
    }

    //is email used
    function IsEmailUsed($email){
        if($this->db->has("user",[
            "email" => $email
        ])){
            return 1;
        }else{
            return 0;
        }
    }


    //
    function IsEmailLegal($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 1;
        }else{
            return 0;
        }
    }

    //login check
    function login_check($username,$passwd){
        if($this->db->has("user",[
            "AND" => [
                "OR" => [
                    "user_name" => $username,
                    "email" => $username
                ],
                "pass" => $passwd
            ]
        ])){
            return 1;
        }else{
            return 0;
        }
    }

    //email Login
    function EmailLogin($email,$passwd){
        if($this->db->has("user",[
            "AND" => [
                 "email" => $email,
                "pass" => $passwd
            ]
        ])){
            return 1;
        }else{
            return 0;
        }
    }

    function UsernameEmailCheck($username,$email){
        if($this->db->has("user",[
            "AND" => [
                    "user_name" => $username,
                    "email" => $email
            ]
        ])){
            return 1;
        }else{
            return 0;
        }
    }
}