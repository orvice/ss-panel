<?php
//引入配置文件
require_once 'user_check.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>ShadowX</title>
    <?php include_once 'lib/header.inc.php'; ?>
</head>
<body class="skin-blue">
<?php include_once 'lib/nav.inc.php';
include_once 'lib/slidebar_left.inc.php';
if($oo->get_transfer()<1000000)
{
    $transfers=0;}else{ $transfers = $oo->get_transfer();

}
//计算流量并保留2位小数
$transfers = $transfers/$tomb;
$transfers = round($transfers,2);
$all_transfer = $oo->get_transfer_enable()/$togb;
$all_transfer = round($all_transfer,2);
$unused_transfer =  $oo->unused_transfer()/$togb;
$unused_transfer = round($unused_transfer,2);
//最后在线时间
$unix_time = $oo->get_last_unix_time();
?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            用户中心
            <small>User Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i>ShadowX</a></li>
            <li class="active">UserCenter</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">我的信息</h3>
                    </div><!-- /.box-header -->
                        <div class="box-body">
                            <p>用户名: <?php echo $user_name; ?></p>
                            <p>邮箱: <?php echo $user_email;  ?></p>
                            <p> 套餐: <span class="label label-info"> <?php echo $oo->get_plan();?> </span> </p> 
                    </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->
<?php include_once 'lib/footer.inc.php'; ?>
</body>
</html>
