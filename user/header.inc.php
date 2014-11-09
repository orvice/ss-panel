<?php
require_once '../lib/config.php';
require_once '../lib/comm.func.php';
require_once '../lib/user.func.php';
require_once '../lib/ss.class.php';

//检测是否登录，若没登录则转向登录界面
if(!isset($_COOKIE['user_name'])||!isset($_COOKIE['user_uid'])||!isset($_COOKIE['user_pwd'])){
    header("Location:../login.php");
    exit();
}else{
    //co
    $uid = $_COOKIE['user_uid'];
    $user_name = $_COOKIE['user_name'];
    $user_pwd  = $_COOKIE['user_pwd'];

    //验证cookie
    $pw = get_user_pass($uid);
    $pw = co_pw($pw);
    if($pw != $user_pwd){
        header("Location:../login.php");
    }
}



$oo = new ss($uid);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> <?php echo $site_name; ?> </title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Loading Bootstrap -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- Loading Flat UI -->
<link href="../css/flat-ui.css" rel="stylesheet">


<!-- Custom styles for this template -->
<link href="../css/sticky-footer-navbar.css" rel="stylesheet">
<link href="../css/dashboard.css" rel="stylesheet">


 <link rel="shortcut icon" href="../favicon.ico">
 <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

 <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>