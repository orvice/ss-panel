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
                        <h3 class="box-title">添加邀请码</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="invite_add_do.php">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="cate_title">邀请码前缀</label>
                                <input  class="form-control" name="code_sub" placeholder="小于8个字符"  >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">邀请码类别</label>
                                <input  class="form-control" name="code_type"  placeholder="0为公开，1为管理员可见，2为已注册用户可见" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">邀请码数量</label>
                                <input  class="form-control" name="code_num" placeholder="要生成的邀请码数量"  >
                            </div>


                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" name="action" value="add" class="btn btn-primary">添加</button>
                        </div>

                        <div class="box-footer">
                            <p>邀请码类别0的<a href="../code.php">在这里查看</a> </p>
                            <p>邀请码类别1的<a href="invite_code.php">在这里查看</a> </p>
                            <p>邀请码类别2的<a href="../user/code.php">在这里查看</a> </p>
                        </div>
                    </form>
                </div>
            </div><!-- /.box -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->
<?php include_once 'lib/footer.inc.php'; ?>
</body>
</html>
