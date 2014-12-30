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
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Node</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>节点</th>
                                    <th>描述</th>
                                    <th>排序</th>
                                    <th>操作</th>
                                </tr>
                                <?php
                                $sql ="SELECT * FROM `ss_node` WHERE `node_type` = '0' ORDER BY node_order ";
                                $query =  $dbc->query($sql);
                                while ( $rs = $query->fetch_array()){ ?>
                                    <tr>
                                        <td>#<?php echo $rs['id']; ?></td>
                                        <td> <?php echo $rs['node_name']; ?></td>
                                        <td><?php echo $rs['node_info']; ?></td>
                                        <td><?php echo $rs['node_order']; ?></td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="node_edit.php?id=<?php echo $rs['node_id']; ?>">编辑</a>
                                            <a class="btn btn-danger btn-sm" href="node_del.php?id=<?php echo $rs['node_id']; ?>">删除</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->
<?php include_once 'lib/footer.inc.php'; ?>
</body>
</html>
