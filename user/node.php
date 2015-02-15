<?php
//引入配置文件
require_once 'user_check.php';
$node = new node();
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
                        $node0 = $node->get_node_array(0);
                        foreach($node0 as $row){
                        ?>
                            <div class="callout callout-info">
                                <h4><?php echo $row['node_name']; ?></h4>
                                <p> <a class="btn btn-xs bg-purple btn-flat margin" href="#">地址:</a> <code><?php echo $row['node_server']; ?></code>
                                    <a class="btn btn-xs bg-orange btn-flat margin" href="#"><?php echo $row['node_status']; ?></a>
                                    <a class="btn btn-xs bg-green btn-flat margin" href="#"><?php echo $row['node_method']; ?></a>
                                    <a class="btn btn-xs bg-blue btn-flat margin" target="_blank" href="node_json.php?id=<?php echo $row['id']; ?>">配置文件</a>
                                    <a class="btn btn-xs bg-yellow btn-flat margin" target="_blank"  href="node_qr.php?id=<?php echo $row['id']; ?>">二维码</a>
                                </p>
                                <p> <?php echo $row['node_info']; ?></p>
                            </div>
                        <?php }?>
                    </div><!-- /.box-body -->


                </div><!-- /.box -->
            </div><!-- /.col (left) -->

            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-code"></i>
                        <h3 class="box-title">Pro节点</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="callout callout-warning">
                            <h4>注意!</h4>
                            <p>此节点仅Plan B用户可用.</p>
                        </div><?php
                        $node1 = $node->get_node_array(1);
                        foreach($node1 as $row){
                            ?>
                            <div class="callout callout-info">
                                <h4><?php echo $row['node_name']; ?></h4>
                                <p> <a class="btn btn-xs bg-purple btn-flat margin" href="#">地址:</a> <code><?php echo $row['node_server']; ?></code>
                                    <a class="btn btn-xs bg-orange btn-flat margin" href="#"><?php echo $row['node_status']; ?></a>
                                    <a class="btn btn-xs bg-green btn-flat margin" href="#"><?php echo $row['node_method']; ?></a>
                                    <a class="btn btn-xs bg-blue btn-flat margin" target="_blank" href="node_json.php?id=<?php echo $row['id']; ?>">配置文件</a>
                                    <a class="btn btn-xs bg-yellow btn-flat margin" target="_blank"  href="node_qr.php?id=<?php echo $row['id']; ?>">二维码</a>
                                </p>
                                <p> <?php echo $row['node_info']; ?></p>
                            </div>
                        <?php }?>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col (right) -->
            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-align-left"></i>
                        <h3 class="box-title">不限流量节点</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="callout callout-info">
                            <h4>说明</h4>
                            <p>使用此端口和密码不限制流量，将不会占用你ShadowX账户的流量。</p>
                            <p>暂时关闭</p>
                        </div>
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
