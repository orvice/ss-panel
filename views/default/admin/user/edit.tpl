{include file='admin/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            用户编辑  #{$user->id}
            <small>Edit User</small>
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
                            <div class="form-group">
                                <label for="email">邮箱</label>
                                <input class="form-control" id="email" value="{$user->email}" >
                            </div>

                            <div class="form-group">
                                <label for="pass">用户密码</label>
                                <input class="form-control" id="pass" value="" placeholder="不修改时留空">
                            </div>

                            <div class="form-group">
                                <label for="port">连接端口</label>
                                <input class="form-control" id="port" value="{$user->port}" >
                            </div>

                            <div class="form-group">
                                <label for="passwd">连接密码</label>
                                <input class="form-control" id="passwd" value="{$user->passwd}" >
                            </div>
<!--
                            <div class="form-group">
                                <label for="usedTraffic">已用流量</label>
                                <input  class="form-control" id="usedTraffic" value="{$user->usedTraffic()}" >
                            </div>
-->
                            <div class="form-group">
                                <label for="transfer_enable">总流量</label>
                                <input  class="form-control" id="transfer_enable" value="{$user->transfer_enable}" >
                            </div>

                            <div class="form-group">
                                <label for="invite_num">可用邀请数</label>
                                <input  class="form-control" id="invite_num" value="{$user->invite_num}" >
                            </div>

                            <div class="form-group">
                                <label for="method">自定义加密方式</label>
                                <input   class="form-control" id="method"  value="{$user->method}" >
                            </div>

                            <div class="form-group">
                                <label for="enable">用户状态</label>
                                <input  class="form-control" id="enable" value="{$user->enable}" placeholder="1-正常 0-禁用">
                            </div>

                            <div class="form-group">
                                <label for="is_admin">是否管理员</label>
                                <input class="form-control" id="is_admin" value="{$user->is_admin}" placeholder="1-是 0-否" >
                            </div>

                            <div class="form-group">
                                <label for="ref_by">邀请人ID</label>
                                <input class="form-control" id="ref_by" value="{$user->ref_by}">
                            </div>
                        </div><!-- /.box-body -->

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

                        <div class="box-footer">
                            <button type="submit" id="submit" name="action" value="add" class="btn btn-primary">修改</button>
                        </div>

                </div>
            </div><!-- /.box -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $(document).ready(function(){
        function submit(){
            $.ajax({
                type:"PUT",
                url:"/admin/user/{$user->id}",
                dataType:"json",
                data:{
                    email: $("#email").val(),
                    pass: $("#pass").val(),
                    port: $("#port").val(),
                    passwd: $("#passwd").val(),
                    transfer_enable: $("#transfer_enable").val(),
                    invite_num: $("#invite_num").val(),
                    method: $("#method").val(),
                    enable: $("#enable").val(),
                    is_admin: $("#is_admin").val(),
                    ref_by: $("#ref_by").val()
                },
                success:function(data){
                    if(data.ret){
                        $("#msg-error").hide(100);
                        $("#msg-success").show(100);
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='/admin/user'", 2000);
                    }else{
                        $("#msg-error").hide(10);
                        $("#msg-error").show(100);
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    $("#msg-error").hide(10);
                    $("#msg-error").show(100);
                    $("#msg-error-p").html("发生错误："+jqXHR.status);
                }
            });
        }
        $("html").keydown(function(event){
            if(event.keyCode==13){
                login();
            }
        });
        $("#submit").click(function(){
            submit();
        });
        $("#ok-close").click(function(){
            $("#msg-success").hide(100);
        });
        $("#error-close").click(function(){
            $("#msg-error").hide(100);
        });
    })
</script>


{include file='admin/footer.tpl'}