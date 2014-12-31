<?php
//用户相关函数


//前台用户登陆检测
function user_login_check($user,$pwd){
    global $dbc;
    $check_query = "SELECT * FROM `user` WHERE user_name='$user'  limit 1";
    $query = $dbc->query($check_query);
    if(!$query){
        //用户名不存在，返回0
        return 0;
    }else{
        $rs = $query->fetch_array();
        if($rs['pass']==$pwd){
            //密码正确返回1
            return 1;
        }else{
            //密码错误返回2
            return 0;
        }
    }
}

//根据用户名返回UID
function get_user_uid($username){
    global $dbc;
    $sql = "SELECT * FROM `user` WHERE user_name='$username'  limit 1";
    $query = $dbc->query($sql);
    if(!$query){
        //无此用户返回0
        return 0;
    }else{
        //返回UID
        $rs = $query->fetch_array();
        $uid = $rs['uid'];
        return $uid;
    }
}

//根据UID返回username
function get_user_name($uid){
    global $dbc;
    $sql = "SELECT * FROM `user` WHERE uid='$uid'  limit 1";
    $query = $dbc->query($sql);
    if(!$query){
        //无此用户返回0
        return 0;
    }else{
        //返回UID
        $rs = $query->fetch_array();
        $username = $rs['user_name'];
        return $username;
    }
}

//根据UID返回email
function get_user_email($uid){
    global $dbc;
    $sql = "SELECT * FROM `user` WHERE uid='$uid'  limit 1";
    $query = $dbc->query($sql);
    if(!$query){
        //无此用户返回0
        return 0;
    }else{
        //返回UID
        $rs = $query->fetch_array();
        $email = $rs['email'];
        return $email;
    }
}

//根据UID返回pass
function get_user_pass($uid){
    global $dbc;
    $sql = "SELECT * FROM `user` WHERE uid='$uid'  limit 1";
    $query = $dbc->query($sql);
    if(!$query){
        //无此用户返回0
        return 0;
    }else{
        //返回UID
        $rs = $query->fetch_array();
        return $rs['pass'];
    }
}

//更改密码
function change_pwd($uid,$new_pwd){
    global $dbc;
    $new_pwd = md5($new_pwd);
    $change_pwd_sql = "UPDATE `user` SET pass = '$new_pwd' WHERE uid ='$uid' ";
    $query = $dbc->query($change_pwd_sql);
    if ($query){
        return true;
    }
    else{
        return false;
    }
}

//更改邮箱
function change_email($uid,$email){
    global $dbc;
    $sql = "UPDATE `user` SET email = '$email' WHERE uid ='$uid' ";
    $query = $dbc->query($sql);
    if ($query){
        return true;
    }
    else{
        return false;
    }
}

//密码验证func
function pwd_verify($uid,$pwd){
    global $dbc;
    $pwd = md5($pwd);
    $sql = "SELECT * FROM `user` WHERE uid='$uid'";
    $query = $dbc->query($sql);
    $rs = $query->fetch_array();
    // uid不存在
    if(empty($rs)){
        return 0;
    }else{
        if($pwd == $rs['pass']){
            return 1;
        }else{
            return 0;
        }
    }
}

//密码相关函数

//修改此参数
$slat = "xx";

//加密
function pw_encode($pw){
    $pw = md5($pw);
    return $pw;
}

/**
 * 将密码加密混淆后保存到cookie
 */
function co_pw($pw){
    //global $slat;
    //$pwd =$pw.$slat;
    //$pwd = md5($pwd);
    $x =  base64_encode($pw);
    $x = substr($x,6,12);
    return $x;
}