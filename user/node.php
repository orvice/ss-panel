<!DOCTYPE html>
<html>
<head>
    <title>ShadowX</title>
    <?php include_once 'lib/header.inc.php'; ?>
</head>
<body class="skin-blue">
<?php include_once 'lib/nav.inc.php';
include_once 'lib/slidebar_left.inc.php';
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
        <h2 class="page-header">Node List</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-th-list"></i>
                        <h3 class="box-title">节点</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="callout callout-info">
                            <h4>加密方式</h4>
                            <p>无特殊说明加密方式均为<code>aes-256-cfb</code></p>
                        </div>
                        <h4>美国</h4>
                        <p>1号:  <code>la.cattt.com</code>   </p>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col (left) -->



            </div><!-- /.col (right) -->
        </div><!-- /.row -->
        <!-- END PROGRESS BARS -->
    </section><!-- /.content -->
</aside><!-- /.right-side --> 
<?php include_once 'lib/footer.inc.php'; ?>
</body>
</html>
