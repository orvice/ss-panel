<?php
//Logout
session_start();
//注销登录
if($_GET['action'] == "logout"){
    //unset($_SESSION['user_id']);
    //unset($_SESSION['user_name']);
    setcookie("admin_name", "", time()-3600);
    header("Location:index.php");
    //echo 'Logout successful <a href="index.php">Index</a>';
    exit;
}
