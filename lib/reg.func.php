<?php
/**
 * reg func
 */



//获取 临时 temp $pass
function get_temp_pass(){
    $a = rand(10000,99999);
    return $a;
}

//判断username是否可用
function is_username_ok($username){
    global $dbc;
    $sql = "SELECT * FROM `user` WHERE  user_name ='$username'  limit 1 ";
    $query = $dbc->query($sql);
    $rs = $query->fetch_array();
    if(empty($rs)){
        //用户名可用
        return 1;
    }else{
        //用户名不可用
        return 0;
    }
}
// $pass ss密码
function reg($username,$email,$pwd,$pass,$transfer,$port,$invite_num,$money){
    global $dbc;
    $sql ="INSERT INTO `user` (`uid`, `user_name`, `email`, `pass`, `passwd`, `t`, `u`, `d`, `plan`, `transfer_enable`, `port`, `switch`, `enable`, `type`, `reg_date`,`invite_num`,`money`)
           VALUES (NULL, '$username', '$email', '$pwd', '$pass', '0', '0', '0', 'A', '$transfer', '$port', '1', '1', '7', now(),$invite_num,$money)";
    $query = $dbc->query($sql);
    if($query){
        return 1;
    }else{
        return 0;
    }
}
