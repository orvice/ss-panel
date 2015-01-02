<?php
//引入配置文件
require_once 'user_check.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $site_name;?></title>
    <?php include_once 'lib/header.inc.php'; ?>
</head>
<?php
if(empty($_POST['pass'])){
    header("Location:index.php");
}else{ 
    $pass = mysqli_real_escape_string($dbc,trim($_POST['pass']));
    $oo->update_ss_pass($pass);
    echo " <script>window.location='index.php';</script> " ;
}