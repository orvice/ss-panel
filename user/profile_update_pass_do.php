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
    $transfer = $oo->get_transfer_enable();
    $oo->set_transfer('-99999');
    sleep(10);
    $oo->update_ss_pass($pass);
    $oo->set_transfer($transfer);
    echo " <script>window.location='index.php';</script> " ;
}
