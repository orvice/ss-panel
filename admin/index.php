<?php
require_once '_main.php';
$ssmin = new \Ss\Etc\Ana();
$mt = $ssmin->get_month_traffic();
$mt = $mt/$togb;
$mt = round($mt,3);
$active_user = $ssmin->user_active_count();
$all_user    = $ssmin->user_all_count();
$node_count  = $ssmin->node_count();
?>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户中心
                <small>User Center</small>
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
    </div><!-- /.content-wrapper -->
<?php
include_once '../Public_javascript.php';
?>
<!-- 在下面添加功能引用的js -->

<?php
require_once '_footer.php'; ?>



