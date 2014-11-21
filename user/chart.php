<!DOCTYPE html>
<html>
<head>
    <title>ShadowX</title>
    <?php include_once 'lib/header.inc.php'; ?>
</head>
<body class="skin-blue">
<?php include_once 'lib/nav.inc.php';
include_once 'lib/slidebar_left.inc.php';
include_once '../lib/ssmin.class.php';
$ssmin = new ssmin();
$mt = $ssmin->get_month_traffic();
$mt = $mt/$togb;
$mt = round($mt,3);
$active_user = $ssmin->user_active_count();
$all_user    = $ssmin->user_all_count();
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
            <div class="col-md-6">
                <!-- AREA CHART -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Area Chart</h3>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="revenue-chart" style="height: 300px;"></div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <!-- DONUT CHART -->
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Donut Chart</h3>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div><!-- /.col (LEFT) -->
            <div class="col-md-6">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Line Chart</h3>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="line-chart" style="height: 300px;"></div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <!-- BAR CHART -->
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Bar Chart</h3>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="bar-chart" style="height: 300px;"></div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div><!-- /.col (RIGHT) -->
        </div><!-- /.row -->

    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<?php include_once 'lib/footer.inc.php'; ?>
</body>
</html>
