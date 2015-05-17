<?php
require_once '_main.php'; ?>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                删除我的账户
                <small>Deactivated My Account</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-body">

                            <div class="callout callout-danger">
                                <h4>Bye!</h4>
                                <p>如果你需要从我们的数据库移除账户信息，请在此输入密码并确认。</p>
                                <p>点击删除按钮后无后续确认，请谨慎操作。</p>
                            </div>

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
                                <input type="password" id="pwd" placeholder="输入密码" class="form-control"  >
                            </div>

                            <div class="box-footer">
                                <button type="submit" id="removeme" class="btn btn-primary"  >删除我</button>
                            </div>

                        </div><!-- /.box -->
                    </div>
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
    $(document).ready(function(){
        $("#removeme").click(function(){
            $.ajax({
                type:"POST",
                url:"_kill.php",
                dataType:"json",
                data:{
                    pwd: $("#pwd").val()
                },
                success:function(data){
                    if(data.ok){
                        $("#msg-success").show();
                        $("#msg-success-p").html(data.msg);
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