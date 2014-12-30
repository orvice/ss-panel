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
<body class="skin-blue">
<?php include_once 'lib/nav.inc.php';
include_once 'lib/slidebar_left.inc.php';
?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            节点列表
            <small>Node List</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- START PROGRESS BARS -->
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
                        </div><?php
                        $sql ="SELECT * FROM `ss_node` WHERE `node_type` = '0' ORDER BY node_order ";
                        $query =  $dbc->query($sql);
                        while ( $rs = $query->fetch_array()){
                        ?>
                        <p><?php echo $rs['node_name']; ?>:  <code><?php echo $rs['node_server']; ?></code><?php echo $rs['node_info']; ?> </p>
                        <?php }?>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col (left) -->

            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-code"></i>
                        <h3 class="box-title">测试节点</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="callout callout-warning">
                            <h4>注意!</h4>
                            <p>测试节点可能随时撤销，有问题请反馈.</p>
                        </div><?php
                        $sql ="SELECT * FROM `ss_node` WHERE `node_type` = '1' ORDER BY node_order ";
                        $query =  $dbc->query($sql);
                        while ( $rs = $query->fetch_array()){
                            ?>
                            <p><?php echo $rs['node_name']; ?>:  <code><?php echo $rs['node_server']; ?></code><?php echo $rs['node_info']; ?> </p>
                        <?php }?>
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
