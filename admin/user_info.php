<?php
require_once '../lib/config.php';
require_once '../lib/func/comm.func.php';
require_once '../lib/func/user.func.php';
require_once '../lib/class/ss.class.php';
$uid = $_GET['uid'];

$oo = new ss($uid);
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
//获得流量信息
if($oo->get_transfer()<1000000)
{
    $transfers=0;}else{ $transfers = $oo->get_transfer();

}
//计算流量并保留2位小数
$all_transfer = $oo->get_transfer_enable()/$togb;
$unused_transfer =  $oo->unused_transfer()/$togb;
$used_100 = $oo->get_transfer()/$oo->get_transfer_enable();
$used_100 = round($used_100,2);
$used_100 = $used_100*100;
//计算流量并保留2位小数
$transfers = $transfers/$tomb;
$transfers = round($transfers,2);
$all_transfer = round($all_transfer,2);
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
            <!-- START PROGRESS BARS -->
            <h2 class="page-header">使用信息</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <h3 class="box-title">流量使用情况</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p> 已用流量: <?php echo $transfers."MB";?> </p>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $used_100; ?>%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                            <p> 可用流量: <?php echo $all_transfer ."GB";?> </p>
                            <p> 剩余流量: <?php echo  $unused_transfer."GB";?> </p>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (left) -->

                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <h3 class="box-title">签到获取流量</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p> 剩余流量小于2G 且24小时内未签到才可以签到。 </p>
                            <?php  if($oo->is_able_to_check_in())  { ?>
                            <p><a class="btn btn-success btn-flat" href="docheckin.php">签到</a> </p>
                            <?php  }else{ ?>
                            <p><a class="btn btn-success btn-flat disabled" href="#">未达到签到要求</a> </p>
                            <?php  } ?>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (right) -->

                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <h3 class="box-title">连接信息</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p> 端口: <code><?php echo $oo->get_port();?></code> </p>
                            <p> 密码: <?php echo $oo->get_pass();?> </p>
                            <p> 套餐: <span class="label label-info"> <?php echo $oo->get_plan();?> </span> </p>
                            <p> 最后使用时间: <code><?php echo date('Y-m-d H:i:s',$unix_time);  ?></code> </p>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (right) -->
            </div><!-- /.row -->
            <!-- END PROGRESS BARS -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->
<?php include_once 'lib/footer.inc.php'; ?>
</body>
</html>
