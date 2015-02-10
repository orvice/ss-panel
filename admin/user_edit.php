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

//更新
if(!empty($_POST)){
    $user_uid = $_POST['user_uid'];
    $user_name = $_POST['user_name'];
    if(!empty($_POST['user_pass'])) {
      $user_pass = md5($_POST['user_pass']);
    }else{
      $user_pass = $_POST['user_pass_hidden'];
    }
    if(!empty($_POST['user_email'])) {
      $user_email = $_POST['user_email'];
    }else{
      $user_email = $_POST['user_email_hidden'];
    }
    $user_passwd = $_POST['user_passwd'];
    if(!empty($_POST['transfer_enable'])) {
      $transfer_enable = $togb*$_POST['transfer_enable'];
    }else{
      $transfer_enable = $_POST['transfer_enable_hidden'];
    }
    $n = new user($user_uid);
    $query = $n->update($user_name,$user_email,$user_pass,$user_passwd,$transfer_enable);
    if($query){
        echo ' <script>alert("更新成功!")</script> ';
        echo " <script>window.location='user.php';</script> " ;
    }
var_dump($query);
}

if(!empty($_GET)){
    //获取id
    $uid = $_GET['uid'];
    $sql = "SELECT * FROM `user` WHERE uid = '$uid' ";
    $query = $dbc->query($sql);
    $rs = $query->fetch_array();
}
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
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">编辑用户</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="user_edit.php">
                        <div class="box-body">

                            <div class="form-group" style="display:none" >
                                <label for="cate_title" >ID</label>
                                <input  class="form-control" name="user_uid" value="<?php echo $uid;?>"  >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">用户名</label>
                                <input  class="form-control" name="user_name" value="<?php echo $rs['user_name'];?>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">用户邮箱</label>
                                <input type="hidden" name="user_email_hidden" value="<?php echo $rs['email'];?>" >
                                <input  class="form-control" name="user_email" placeholder="新邮箱(不修改请留空)" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">用户密码</label>
                                <input type="hidden" name="user_pass_hidden" value="<?php echo $rs['pass'];?>" >
                                <input  class="form-control" name="user_pass" placeholder="新密码(不修改请留空)" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">连接密码</label>
                                <input  class="form-control" name="user_passwd" value="<?php echo $rs['passwd'];?>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">设置流量</label>
                                <input type="hidden" name="transfer_enable_hidden" value="<?php echo $rs['transfer_enable'];?>" >
                                <input   class="form-control" name="transfer_enable"  placeholder="单位为GB，直接输入数值" >
                            </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" name="action" value="edit" class="btn btn-primary">修改</button>
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
