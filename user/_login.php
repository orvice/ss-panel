<?php
require_once '../lib/config.php';
$email = $_POST['email'];
$email = strtolower($email);
$passwd = $_POST['passwd'];
$passwd = \Ss\User\Comm::SsPW($passwd);
$rem = $_POST['remember_me'];
$c = new \Ss\User\UserCheck();
$q = new \Ss\User\Query();
//加入防签到系统平台，如果不是在登录页点的登录，返回非法访问。
if($_SERVER['HTTP_REFERER']!=$site_url."user/login.php"){
    $rs['code'] = '0';
    $rs['msg'] = "非法访问";
}
elseif($c->EmailLogin($email,$passwd)){
    $rs['code'] = '1';
    $rs['ok'] = '1';
    $rs['msg'] = "欢迎回来";
    //login success
    if($rem= "week"){
        $ext = 3600*24*7;
    }else{
        $ext = 3600;
    }
    //获取用户id
    $id = $q->GetUidByEmail($email);
    //处理密码
    $pw = \Ss\User\Comm::CoPW($passwd);
    setcookie("user_pwd",$pw,time()+$ext);
    setcookie("uid",$id,time()+$ext);
    setcookie("user_email",$email,time()+$ext);
}else{
    $rs['code'] = '0';
    $rs['msg'] = "邮箱或者密码错误";
}
echo json_encode($rs,JSON_UNESCAPED_UNICODE);
