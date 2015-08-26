<{include file='admin/main.tpl'}>

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
                                <label for="cate_title">ID: <{$uid}></label>
                            </div>

                            <div class="form-group">
                                <label for="cate_title">用户名</label>
                                <input  class="form-control" id="user_name" value="<{$rs['user_name']}>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">用户邮箱</label>
                                <input  class="form-control" id="user_email" value="<{$rs['email']}>"  >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">用户密码</label>
                                <input  class="form-control" id="user_pass" placeholder="新密码(不修改请留空)" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">连接密码</label>
                                <input  class="form-control" id="user_passwd" value="<{$rs['passwd']}>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">设置流量</label>
                                <input   class="form-control" id="transfer_enable" value="<{\Ss\Etc\Comm::flowAutoShow($rs['transfer_enable'])}>" placeholder="单位为GB，直接输入数值" >
                            </div>
                            
                            <div class="form-group">
                                <label for="cate_title">邀请码数量</label>
                                <input  class="form-control" id="invite_num" value="<{$rs['invite_num']}>" 
                            </div>
                            
                            <div class="form-group">
                                <label for="enable">是否启用（1为启用，0为停用）</label>
                                <input type="text" name="enable" id="enable" value="<{$rs['enable']}>" class="form-control"> 
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

<{include file='Public_javascript.tpl'}>
<!-- 在下面添加功能引用的js -->

<script>
    $(document).ready(function(){
        $("#Submit").click(function(){
            $.ajax({
                type:"POST",
                url:"_user_edit.php",
                dataType:"json",
                data:{
                    user_uid: "<{$uid}>",
                    user_name: $("#user_name").val(),
                    user_email: $("#user_email").val(),
                    user_email_hidden: "<{$rs['email']}>",
                    user_pass: $("#user_pass").val(),
                    user_pass_hidden: "<{$rs['pass']}>",
                    user_passwd: $("#user_passwd").val(),
                    transfer_enable: $("#transfer_enable").val(),
                    transfer_enable_hidden: "<{\Ss\Etc\Comm::flowAutoShow($rs['transfer_enable'])}>",
                    invite_num: $("#invite_num").val(),
                    enable: $("#enable").val()
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

<{include file='user/footer.tpl'}>
