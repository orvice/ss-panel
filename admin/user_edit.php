<?php
require_once '_main.php';

if(!empty($_GET)){
    //获取id
    $uid = $_GET['uid'];
    $u = new \Ss\User\UserInfo($uid);
    $rs = $u->UserArray();
}

?>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
        <h1>
            用户管理
            <small>User Manage</small>
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
                        <div class="box-body">

                            <div class="form-group">
                                <label for="cate_title">ID: <?php echo $uid;?></label>
                                <input type="hidden" class="form-control" id="user_uid" value="<?php echo $uid;?>"  >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">用户名</label>
                                <input  class="form-control" id="user_name" value="<?php echo $rs['user_name'];?>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">用户邮箱</label>
                                <input  class="form-control" id="user_email" value="<?php echo $rs['email'];?>"  >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">用户密码</label>
                                <input type="hidden" id="user_pass_hidden" value="<?php echo $rs['pass'];?>" >
                                <input  class="form-control" id="user_pass" placeholder="新密码(不修改请留空)" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">连接密码</label>
                                <input  class="form-control" id="user_passwd" value="<?php echo $rs['passwd'];?>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">设置流量</label>
                                <input type="hidden" id="transfer_enable_hidden" value="<?php echo $rs['transfer_enable'];?>" >
                                <input   class="form-control" id="transfer_enable"  placeholder="单位为GB，直接输入数值" >
                            </div>
                            
                            <div class="form-group">
                                <label for="cate_title">邀请码数量</label>
                                <input type="hidden" id="invite_num_hidden" value="<?php echo $rs['invite_num'];?>" >
                                <input  class="form-control" id="invite_num" placeholder="<?php echo $rs['invite_num'];?>" 
                            </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="Submit" id="Submit" name="action" value="edit" class="btn btn-primary">修改</button>
                        </div>
                        <div id="msg-success" class="alert alert-info alert-dismissable" style="display: none;">
                            <button type="button" class="close" id="ok-close" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-info"></i> 成功!</h4>
                            <p id="msg-success-p"></p>
                        </div>
                        <div id="msg-error" class="alert alert-warning alert-dismissable" style="display: none;">
                            <button type="button" class="close" id="error-close" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> 出错了!</h4>
                            <p id="msg-error-p"></p>
                        </div>
                </div>
            </div><!-- /.box -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php
include_once '../Public_javascript.php';
?>
<!-- 在下面添加功能引用的js -->

<script>
    $(document).ready(function(){
        $("#Submit").click(function(){
            $.ajax({
                type:"POST",
                url:"_user_edit.php",
                dataType:"json",
                data:{
                    user_uid: $("#user_uid").val(),
                    user_name: $("#user_name").val(),
                    user_email: $("#user_email").val(),
                    user_email_hidden: $("#user_email_hidden").val(),
                    user_pass: $("#user_pass").val(),
                    user_pass_hidden: $("#user_pass_hidden").val(),
                    user_passwd: $("#user_passwd").val(),
                    transfer_enable: $("#transfer_enable").val(),
                    transfer_enable_hidden: $("#transfer_enable_hidden").val(),
                    invite_num: $("#invite_num").val(),
                    invite_num_hidden: $("#invite_num_hidden").val()
                },
                success:function(data){
                    if(data.ok){
                        $("#msg-error").hide(10);
                        $("#msg-success").show(100);
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='user.php'", 2000);
                    }else{
                        $("#msg-error").show(100);
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    $("#msg-error").hide(10);
                    $("#msg-error").show(100);
                    $("#msg-error-p").html("发生错误："+jqXHR.status);
                }
            })
        })
        $("#ok-close").click(function(){
            $("#msg-success").hide(100);
        })
        $("#error-close").click(function(){
            $("#msg-error").hide(100);
        })
    })
</script>
<?php
require_once '_footer.php'; ?>
