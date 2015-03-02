<?php
header("Content-type: text/html; charset=utf-8");
//注册处理页面
require_once '../lib/config.php';
require_once '../lib/class/user.class.php';
require_once '../lib/func/comm.func.php';
require_once '../lib/func/user.func.php';
require_once '../lib/func/reg.func.php';
require_once '../lib/class/invite_code.class.php';
$u = new user();
//验证Post是否空
if(empty($_POST) || empty($_POST['username'])){
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
$okk =0;
//验证码
//邀请码检测
if($invite_only){
    $ic = new invite_code($code);
    if($ic->invite_code_test() == 0){
        $okk = 0;
        echo ' <script>alert("邀请码无效!")</script> ';
        echo " <script>window.location='reg.php';</script> " ;
    }else{
        $okk = 1;
    }
}else{
    $okk =1;
}
//验证均通过
if($okk){
    $info_ok = 1;
    //用户名检测
    if($u->is_username_used($username)==0){
        $info_ok = 0;
        echo ' <script>alert("用户名已经被使用!")</script> ';
        echo " <script>window.location='reg.php';</script> " ;
    }

    if($u->is_email_used($email)==0){
        $info_ok = 0;
        echo ' <script>alert("邮箱已经被使用!")</script> ';
        echo " <script>window.location='reg.php';</script> " ;
    }

    if(strlen($username)<7||strlen($username)>32){
        $info_ok = 0;
        echo ' <script>alert("用户名长度错误!")</script> ';
        echo " <script>window.location='reg.php';</script> " ;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $info_ok = 0;
        echo ' <script>alert("邮箱地址错误")</script> ';
        echo " <script>window.location='reg.php';</script> " ;
    }

    if($info_ok){
        //do reg
        //默认信息  $pass ss密码  $transfer 流量  $port 端口
        $pass = get_temp_pass();
        $transfer = $a_transfer;
        $r = new \Ss\User\Reg();
        $last_port = $r->get_last_port();
        $port = $last_port + rand(2, 7);

        //邀请码数量
        $invite_num = rand($user_invite_min,$user_invite_max);

        $rt = reg($username, $email, $pwd, $pass, $transfer, $port, $invite_num, 0.00);
        if ($rt) {
            echo ' <script>alert("注册成功，返回登录!")</script> ';
            echo " <script>window.location='login.php';</script> ";
            //删除邀请码
            if ($invite_only) {
                $ic->invite_code_del();
            }
        } else {
            echo ' <script>alert("未知错误!")</script> ';
            echo " <script>window.location='reg.php';</script> ";
        }
    }
}



