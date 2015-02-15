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
$tomb = 1024*1024;
$togb = $tomb*1024;

?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            用户列表
            <small>User List</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>用户名</th>
                                    <th>邮箱</th>
                                    <th>端口</th>
                                    <th>设置流量</th>
                                    <th>剩余流量</th>
                                    <th>最后签到</th>
                                    <th>操作</th>
                                </tr>
                                <?php
                                $sql ="SELECT * FROM `user`  ORDER BY uid ";
                                $query =  $dbc->query($sql);
                                while ( $rs = $query->fetch_array()){ ?>
                                    <tr>
                                        <td>#<?php echo $rs['uid']; ?></td>
                                        <td><?php echo $rs['user_name']; ?></td>
                                        <td><?php echo $rs['email']; ?></td>
                                        <td><?php echo $rs['port']; ?></td>
                                        <td><?php echo round($rs['transfer_enable']/$togb,2); ?></td>
                                        <td><?php echo round(($rs['transfer_enable']-$rs['u']-$rs['d'])/$togb,2); ?></td>
                                        <td><?php echo date('Y-m-d H:i:s',$rs['last_check_in_time']); ?></td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="user_edit.php?uid=<?php echo $rs['uid']; ?>">编辑</a>
                                            <a class="btn btn-danger btn-sm" href="user_del.php?uid=<?php echo $rs['uid']; ?>">删除</a>
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
