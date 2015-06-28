<?php
//检测是否登录，若没登录则转向登录界面
if((isset($_COOKIE['uid'])|| $_COOKIE['uid'] != '') && (isset($_COOKIE['user_email'])|| $_COOKIE['user_email'] != '') && (isset($_COOKIE['user_pwd'])|| $_COOKIE['user_pwd'] != '')){
        $uid = $_COOKIE['uid'];
        $user_email = $_COOKIE['user_email'];
        $user_pwd  = $_COOKIE['user_pwd'];
        $U = new \Ss\User\UserInfo($uid);
        //验证cookie
        $pwd = $U->GetPasswd();
        $email = $U->GetEmail();
        $pw = \Ss\User\Comm::CoPW($pwd);
        if($pw == $user_pwd && $email == $user_email){
            $oo = new Ss\User\Ss($uid);
        } else {
            setcookie("uid", "", time()-3600);
            setcookie("user_email", "", time()-3600);
            setcookie("user_pwd", "", time()-3600);
            header("Location:login.php");
            exit();
        }
}else{
    header("Location:login.php");
    exit();
}
