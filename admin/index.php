<?php
//引入配置文件
require_once 'user_check.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $admin_title;?></title>
    <?php include_once 'lib/header.inc.php'; ?>
</head>
<body class="skin-blue">
<?php include_once 'lib/nav.inc.php';
include_once 'lib/slidebar_left.inc.php';
include_once '../lib/class/ssmin.class.php';
$ssmin = new ssmin();
$mt = $ssmin->get_month_traffic();
$mt = $mt/$togb;
$mt = round($mt,3);
$active_user = $ssmin->user_active_count();
$all_user    = $ssmin->user_all_count();
$node_count  = $ssmin->node_count();
?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            管理中心
            <small>Admin Panel</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?php  echo $node_count; ?>
                        </h3>
                        <p>
                            节点
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cloud"></i>
                    </div>
                    <a href="node.php" class="small-box-footer">
                        管理 <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
             
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                            <?php  echo $all_user; ?>
                        </h3>
                        <p>
                            用户
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="user.php" class="small-box-footer">
                        查看 <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->

        </div><!-- /.row -->

    </section><!-- /.content -->
</aside><!-- /.right-side -->
<?php include_once 'lib/footer.inc.php'; ?>
</body>
</html>
