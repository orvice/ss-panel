<?php
session_start();
setcookie("user_name", "", time()-3600);
setcookie("user_pwd", "", time()-3600);
setcookie("uid", "", time()-3600);
setcookie("user_email", "", time()-3600);
header("Location:login.php");
exit;