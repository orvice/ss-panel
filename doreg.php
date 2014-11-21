<?php
header("Content-type: text/html; charset=utf-8");
//注册处理页面
require_once 'lib/config.php';
require_once 'lib/comm.func.php';
require_once 'lib/user.func.php';
require_once 'lib/reg.func.php';
require_once 'lib/invite_code.class.php';

//验证Post是否空
if(empty($_POST)){
    header("location:reg.php");
}else{
    $username = mysqli_real_escape_string($dbc,trim($_POST['username']));
    $pwd      = mysqli_real_escape_string($dbc,trim($_POST['password']));
    $email    = mysqli_real_escape_string($dbc,trim($_POST['email']));
    $code     = mysqli_real_escape_string($dbc,trim($_POST['code']));

    setcookie("reg_name",$username,time()+60);
    setcookie("reg_email",$email,time()+60);
    setcookie("reg_code",$code,time()+60);
}

$pwd = md5($pwd);
$okk =1;
//验证码
//邀请码检测
if($invite_only){
    $ic = new invite_code($code);
    if($ic->invite_code_test() == 0){
        $okk = 0;
        echo ' <script>alert("邀请码无效!")</script> ';
        echo " <script>window.location='reg.php';</script> " ;
    }
}
//验证均通过
if($okk){

    //用户名检测
    if(is_username_ok($username)==0){
        echo ' <script>alert("用户名已经被使用!")</script> ';
        echo " <script>window.location='reg.php';</script> " ;
    }else{
        //do reg
        //默认信息  $pass ss密码  $transfer 流量  $port 端口
        $pass    = get_temp_pass();
        $transfer = $a_transfer;
        $port    = get_last_port()+rand(2,7);

        //邀请码数量
        $invite_num = rand(1,1);

        $rt = reg($username,$email,$pwd,$pass,$transfer,$port,$invite_num,0.00);
        if($rt){
            echo ' <script>alert("注册成功，返回登录!")</script> ';
            echo " <script>window.location='login.php';</script> " ;
            //删除邀请码
            if($invite_only){
                $ic->invite_code_del();
            }
        }else{
            echo ' <script>alert("未知错误!")</script> ';
            echo " <script>window.location='reg.php';</script> " ;
        }
    }
}



