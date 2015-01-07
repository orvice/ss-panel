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
?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            邀请管理
            <small>Invite Manage</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">邀请码(仅管理员可见)</h3>
                    </div><!-- /.box-header -->


                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>###</th>
                                <th>邀请码</th>
                                <th>状态</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $sql = "SELECT * FROM `invite_code` WHERE user = '1' limit 21 ";
                            $query = $dbc->query($sql);
                            $a = 0;
                            while($rs = $query->fetch_array()){
                                ?>
                                <tr>
                                    <td><?php echo $a;$a++; ?></td>
                                    <td><?php echo $rs['code'];?></td>
                                    <td>可用</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div><!-- /.box -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->
<?php include_once 'lib/footer.inc.php'; ?>
</body>
</html>
