<?php
require_once '_main.php'; ?>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                信息更新
                <small>Profile Update</small>
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
                            <h3 class="box-title">网站登录密码修改</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->

                            <div class="box-body">

                                <div id="msg-error" class="alert alert-warning alert-dismissable" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-warning"></i> 出错了!</h4>
                                    <p id="msg-error-p"></p>
                                </div>

                                <div id="msg-success" class="alert alert-info alert-dismissable" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-info"></i> Ok!</h4>
                                    <p id="msg-success-p"></p>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="当前密码(必填)" id="nowpwd">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="新密码" id="pwd">
                                </div>

                                <div class="form-group">
                                    <input type="password" placeholder="确认密码" class="form-control" id="repwd">
                                </div>

                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" id="pwd-update" class="btn btn-primary">修改</button>
                            </div>

                    </div><!-- /.box -->
                </div>

                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <i class="fa fa-align-left"></i>
                            <h3 class="box-title">Shadowsocks连接密码修改</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">

                                <div id="ss-msg-success" class="alert alert-info alert-dismissable" style="display:none" >
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-info"></i> 修改成功!</h4>
                                    <p id="ss-msg-success-p"></p>
                                </div>



                                <div class="form-group">
                                    <input type="text" id="sspwd" placeholder="输入新密码" class="form-control"  >
                                </div>

                                <div class="box-footer">
                                    <button type="submit" id="ss-pwd-update" class="btn btn-primary"  >修改 </button>
                                </div>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (right) -->

            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php
include_once '../Public_javascript.php';
?>
<!-- 在下面添加功能引用的js -->

<?php
require_once '_footer.php'; ?>
<script>
    $("#msg-success").hide();
    $("#msg-error").hide();
    $("#ss-msg-success").hide();
</script>

<script>
    $(document).ready(function(){
        $("#pwd-update").click(function(){
            $.ajax({
                type:"POST",
                url:"_pwd_update.php",
                dataType:"json",
                data:{
                    nowpwd: $("#nowpwd").val(),
                    pwd: $("#pwd").val(),
                    repwd: $("#repwd").val()
                },
                success:function(data){
                    if(data.ok){
                        $("#msg-error").hide();
                        $("#msg-success").show();
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='login.php'", 2000);
                    }else{
                        $("#msg-error").show();
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    alert("发生错误："+jqXHR.status);
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function(){
        $("#ss-pwd-update").click(function(){
            $.ajax({
                type:"POST",
                url:"_sspwd_update.php",
                dataType:"json",
                data:{
                    sspwd: $("#sspwd").val()
                },
                success:function(data){
                    if(data.ok){
                        $("#ss-msg-success").show();
                        $("#ss-msg-success-p").html(data.msg);
                    }else{
                        $("#ss-msg-error").show();
                        $("#ss-msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    alert("发生错误："+jqXHR.status);
                }
            })
        })
    })
</script>
