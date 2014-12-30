<?php
/**
 *  Login pages
 */


//设置编码
header("content-type:text/html;charset=utf-8");

//引用数据库连接文件
require_once '../lib/config.php';
require_once '../lib/func/admin.func.php';
//require_once 'lib/func/pw.func.php';


if(!empty($_POST)){

    //获取_POST并赋值
    $username = mysqli_real_escape_string($dbc,trim($_POST['username']));
    $pwd      = md5($_POST['password']); //md5加密
    $rem = $_POST['remember_me'];
    $rt = user_login_check($username,$pwd);
    if($rt==1){
        if($rem= "week"){
            $ext = 3600*24*7;
        }else{
            $ext = 3600;
        }
        //获取用户id
        $id = get_user_uid($username);
        //处理密码
        $pw = co_pw($pwd);
        setcookie("admin_name", $username, time()+$ext);
        setcookie("admin_pwd",$pw,time()+$ext);
        setcookie("admin_uid",$id,time()+$ext);
        header("location: index.php ");
        exit;
    }
    else {
        echo ' <script>alert("用户名或密码错误!")</script> ';
        echo " <script>window.location='login.php';</script> " ;
    }

}
?>