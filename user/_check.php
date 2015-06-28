<?php
//检测是否登录，若没登录则转向登录界面
if(isset($_COOKIE['uid'])|| $_COOKIE['uid'] != ''){
        //co
        $uid = $_COOKIE['uid'];
        $user_email = $_COOKIE['user_email'];
        $user_pwd  = $_COOKIE['user_pwd'];

        $U = new \Ss\User\UserInfo($uid);
        //验证cookie
        $pwd = $U->GetPasswd();
        $pw = \Ss\User\Comm::CoPW($pwd);
        if($pw != $user_pwd || $pw == null || $user_pwd == null  ){
            header("Location:login.php");
        }
}else{
    header("Location:login.php");
    exit();
}
$oo = new Ss\User\Ss($uid);