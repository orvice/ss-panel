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
                        <div class="callout callout-warning">
                            <h4>注意!</h4>
                            <p>请勿在任何地方公开节点地址！</p>
                        </div><?php
                        $sql ="SELECT * FROM `ss_node` WHERE `node_type` = '0' ORDER BY node_order ";
                        $query =  $dbc->query($sql);
                        while ( $rs = $query->fetch_array()){
                        ?>
                            <div class="callout callout-info">
                                <h4><?php echo $rs['node_name']; ?></h4>
                                <p> <a class="btn btn-xs bg-purple btn-flat margin" href="#">地址:</a> <code><?php echo $rs['node_server']; ?></code>
                                    <a class="btn btn-xs bg-orange btn-flat margin" href="#"><?php echo $rs['node_status']; ?></a>
                                    <a class="btn btn-xs bg-green btn-flat margin" href="#"><?php echo $rs['node_method']; ?></a>
                                    <a class="btn btn-xs bg-blue btn-flat margin" target="_blank" href="node_json.php?id=<?php echo $rs['id']; ?>">配置文件</a>
                                    <a class="btn btn-xs bg-yellow btn-flat margin" target="_blank"  href="node_qr.php?id=<?php echo $rs['id']; ?>">QR二维码</a>
                                </p>
                                <p> <?php echo $rs['node_info']; ?></p>
                            </div>
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
                            <div class="callout callout-info">
                                <h4><?php echo $rs['node_name']; ?></h4>
                                <p> <a class="btn btn-xs bg-purple btn-flat margin" href="#">地址:</a> <code><?php echo $rs['node_server']; ?></code>
                                    <a class="btn btn-xs bg-orange btn-flat margin" href="#"><?php echo $rs['node_status']; ?></a>
                                    <a class="btn btn-xs bg-green btn-flat margin" href="#"><?php echo $rs['node_method']; ?></a>
                                    <a class="btn btn-xs bg-blue btn-flat margin" target="_blank" href="node_json.php?id=<?php echo $rs['id']; ?>">配置文件</a>
                                    <a class="btn btn-xs bg-yellow btn-flat margin" target="_blank"  href="node_qr.php?id=<?php echo $rs['id']; ?>">QR二维码</a>
                                </p>
                                <p> <?php echo $rs['node_info']; ?></p>
                            </div>
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
