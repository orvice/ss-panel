<?php

 class user {

     public  $uid;
     private $dbc;
     private $db;

     function __construct($uid){
         global $dbc;
         global $db;
         $this->uid = $uid;
         $this->dbc = $dbc;
         $this->db  = $db;
     }

     function update($user_name,$user_email,$user_pass,$user_passwd,$transfer_enable){
         $sql = " UPDATE `user` SET
                  `user_name` = '$user_name',
                  `email` = '$user_email',
                  `pass` = '$user_pass',
                  `passwd` = '$user_passwd',
                  `transfer_enable` = '$transfer_enable'
                  WHERE  `uid` = '$this->uid' ";
         $reset = " UPDATE `user` SET `transfer_enable` = '-9999' WHERE `uid` = '$this->uid' ";
         $this->dbc->query($reset);
         sleep(15);
         $query = $this->dbc->query($sql);
         return $query;
     }
     //del user
     function del(){
         $this->db->delete("user",[
            "uid" => $this->uid
         ]);
         return 1;
     }

     //获取 临时 temp $pass
     function get_temp_pass(){
         $a = rand(10000,99999);
         return $a;
     }

    //判断username是否可用
    //可用,用户名不存在返回1
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

    // 用户注册 $pass ss密码
    function reg($username,$email,$pass,$passwd,$plan,$transfer,$port,$invite_num,$money){
        $sql ="INSERT INTO `user` (`uid`, `user_name`, `email`, `pass`, `passwd`, `t`, `u`, `d`, `plan`, `transfer_enable`, `port`, `switch`, `enable`, `type`, `reg_date`,`invite_num`,`money`)
           VALUES (NULL, '$username', '$email', '$pwd', '$pass', '0', '0', '0', 'A', '$transfer', '$port', '1', '1', '7', now(),$invite_num,$money)";
        $query = $this->dbc->query($sql);
        $this->db->insert("user",[
            "user_name" => $username,
            "email"     => $email,
            "pass" => $pass,
            "passwd" => $passwd,
            "t"  => "0",
            "u"  => "0",
            "d"  => "0",
            "plan" => $plan,
            "transfer" => $transfer,
            "port"  => $port,
            "invite_num" => $invite_num,
            "money" => $money
        ]);
        if($query){
            return 1;
        }else{
            return 0;
        }
    }
    //邮箱地址验证
    function isEmailOK($email){
        //邮箱正则
        $isEmail= '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/';
        if(preg_match($isEmail,$email)){
            return true;
        }else{
            return false;
        }
    }

}
