{include file='user/main.tpl'}

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            修改资料
            <small>Profile Edit</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div id="msg-error" class="alert alert-warning alert-dismissable" style="display:none">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> 出错了!</h4>

                    <p id="msg-error-p"></p>
                </div>
                <div id="ss-msg-success" class="alert alert-success alert-dismissable" style="display:none">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-info"></i> 修改成功!</h4>

                    <p id="ss-msg-success-p"></p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="fa fa-key"></i>

                        <h3 class="box-title">网站登录密码修改</h3>
                    </div>
                    <!-- /.box-header --><!-- form start -->

                    <div class="box-body">
                        <div class="form-horizontal">

                            <div id="msg-success" class="alert alert-info alert-dismissable" style="display:none">
                                <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-info"></i> Ok!</h4>

                                <p id="msg-success-p"></p>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">当前密码</label>

                                <div class="col-sm-9">
                                    <input type="password" class="form-control" placeholder="当前密码(必填)" id="oldpwd">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">新密码</label>

                                <div class="col-sm-9">
                                    <input type="password" class="form-control" placeholder="新密码" id="pwd">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">确认密码</label>

                                <div class="col-sm-9">
                                    <input type="password" placeholder="确认密码" class="form-control" id="repwd">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" id="pwd-update" class="btn btn-primary">修改</button>
                    </div>

                </div>
                <!-- /.box -->
            </div>

            <div class="col-md-6">

                <div class="box box-primary">
                    <div class="box-header">
                        <i class="fa fa-link"></i>

                        <h3 class="box-title">连接信息修改</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">连接密码</label>

                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" id="sspwd" placeholder="输入新连接密码" class="form-control">
                                        <div class="input-group-btn">
                                            <button type="submit" id="ss-pwd-update" class="btn btn-primary">修改</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">加密方式</label>

                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select class="form-control" id="method">
                                        {foreach $method as $cipher}
                                           <option value="{$cipher}" {if $user->method==$cipher}selected="selected"{/if} >{$cipher}</option>  
                                        {/foreach}
                                        </select>  
                                        <div class="input-group-btn">
                                            <button type="submit" id="method-update" class="btn btn-primary">修改</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">协议插件</label>

                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select class="form-control" id="protocol">
                                            {foreach $protocol as $cipher}
                                                <option value="{$cipher}" {if $user->protocol==$cipher}selected="selected"{/if} >{$cipher}</option>
                                            {/foreach}
                                        </select>
                                        <div class="input-group-btn">
                                            <button type="submit" id="protocol-update" class="btn btn-primary">修改</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">协议参数</label>

                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" id="protocol-param" value="{$user->protocol_param}"  placeholder="输入新协议参数" class="form-control">
                                        <div class="input-group-btn">
                                            <button type="submit" id="protocol-param-update" class="btn btn-primary">修改</button>
                                        </div>
                                    </div>
                                    <p class="help-block">
                                        在 auth_chain_* 协议中表示最多允许同时连接的客户端数。
                                    </p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">混淆插件</label>

                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select class="form-control" id="obfs">
                                            {foreach $obfs as $cipher}
                                                <option value="{$cipher}" {if $user->obfs==$cipher}selected="selected"{/if} >{$cipher}</option>
                                            {/foreach}
                                        </select>
                                        <div class="input-group-btn">
                                            <button type="submit" id="obfs-update" class="btn btn-primary">修改</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">混淆参数</label>

                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" id="obfs-param" value="{$user->obfs_param}" placeholder="输入新混淆参数" class="form-control">
                                        <div class="input-group-btn">
                                            <button type="submit" id="obfs-param-update" class="btn btn-primary">修改</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							<hr>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">V2Ray UUID</label>

                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" id="v2ray-uuid" value="{$user->v2ray_uuid}" class="form-control" disabled>
                                        <div class="input-group-btn">
                                            <button type="submit" id="v2ray-uuid-update" class="btn btn-primary">更换</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">V2Ray Alter ID</label>

                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" id="v2ray-alterid" value="{$user->v2ray_alter_id}" placeholder="输入新 Alter ID" class="form-control">
                                        <div class="input-group-btn">
                                            <button type="submit" id="v2ray-alterid-update" class="btn btn-primary">修改</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="box-footer"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col (right) -->

        </div>
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $("#msg-success").hide();
    $("#msg-error").hide();
    $("#ss-msg-success").hide();
</script>

<script>
    $(document).ready(function () {
        $("#pwd-update").click(function () {
            $.ajax({
                type: "POST",
                url: "password",
                dataType: "json",
                data: {
                    oldpwd: $("#oldpwd").val(),
                    pwd: $("#pwd").val(),
                    repwd: $("#repwd").val()
                },
                success: function (data) {
                    if (data.ret) {
                        $("#msg-error").hide();
                        $("#msg-success").show();
                        $("#msg-success-p").html(data.msg);
                    } else {
                        $("#msg-error").show();
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error: function (jqXHR) {
                    alert("发生错误：" + jqXHR.status);
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function () {
        $("#ss-pwd-update").click(function () {
            $.ajax({
                type: "POST",
                url: "sspwd",
                dataType: "json",
                data: {
                    sspwd: $("#sspwd").val()
                },
                success: function (data) {
                    if (data.ret) {
                        $("#ss-msg-success").show();
                        $("#ss-msg-success-p").html(data.msg);
                    } else {
                        $("#ss-msg-error").show();
                        $("#ss-msg-error-p").html(data.msg);
                    }
                },
                error: function (jqXHR) {
                    alert("发生错误：" + jqXHR.status);
                }
            })
        })
    })
</script>


<script>
    $(document).ready(function () {
        $("#method-update").click(function () {
            $.ajax({
                type: "POST",
                url: "method",
                dataType: "json",
                data: {
                    method: $("#method").val()
                },
                success: function (data) {
                    if (data.ret) {
                        $("#ss-msg-success").show();
                        $("#ss-msg-success-p").html(data.msg);
                    } else {
                        $("#ss-msg-error").show();
                        $("#ss-msg-error-p").html(data.msg);
                    }
                },
                error: function (jqXHR) {
                    alert("发生错误：" + jqXHR.status);
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function () {
        $("#protocol-update").click(function () {
            $.ajax({
                type: "POST",
                url: "protocol",
                dataType: "json",
                data: {
                    protocol: $("#protocol").val()
                },
                success: function (data) {
                    if (data.ret) {
                        $("#ss-msg-success").show();
                        $("#ss-msg-success-p").html(data.msg);
                    } else {
                        $("#ss-msg-error").show();
                        $("#ss-msg-error-p").html(data.msg);
                    }
                },
                error: function (jqXHR) {
                    alert("发生错误：" + jqXHR.status);
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function () {
        $("#protocol-param-update").click(function () {
            $.ajax({
                type: "POST",
                url: "protocol-param",
                dataType: "json",
                data: {
                    'protocol-param': $("#protocol-param").val()
                },
                success: function (data) {
                    if (data.ret) {
                        $("#ss-msg-success").show();
                        $("#ss-msg-success-p").html(data.msg);
                    } else {
                        $("#ss-msg-error").show();
                        $("#ss-msg-error-p").html(data.msg);
                    }
                },
                error: function (jqXHR) {
                    alert("发生错误：" + jqXHR.status);
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function () {
        $("#obfs-update").click(function () {
            $.ajax({
                type: "POST",
                url: "obfs",
                dataType: "json",
                data: {
                    obfs: $("#obfs").val()
                },
                success: function (data) {
                    if (data.ret) {
                        $("#ss-msg-success").show();
                        $("#ss-msg-success-p").html(data.msg);
                    } else {
                        $("#ss-msg-error").show();
                        $("#ss-msg-error-p").html(data.msg);
                    }
                },
                error: function (jqXHR) {
                    alert("发生错误：" + jqXHR.status);
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function () {
        $("#obfs-param-update").click(function () {
            $.ajax({
                type: "POST",
                url: "obfs-param",
                dataType: "json",
                data: {
                    'obfs-param': $("#obfs-param").val()
                },
                success: function (data) {
                    if (data.ret) {
                        $("#ss-msg-success").show();
                        $("#ss-msg-success-p").html(data.msg);
                    } else {
                        $("#ss-msg-error").show();
                        $("#ss-msg-error-p").html(data.msg);
                    }
                },
                error: function (jqXHR) {
                    alert("发生错误：" + jqXHR.status);
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function () {
        $("#v2ray-uuid-update").click(function () {
            $.ajax({
                type: "POST",
                url: "v2ray-uuid",
                dataType: "json",
                success: function (data) {
                    if (data.ret) {
                        $("#ss-msg-success").show();
                        $("#ss-msg-success-p").html(data.msg);
                        setTimeout(function() { history.go(0) }, 1000);
                    } else {
                        $("#ss-msg-error").show();
                        $("#ss-msg-error-p").html(data.msg);
                    }
                },
                error: function (jqXHR) {
                    alert("发生错误：" + jqXHR.status);
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function () {
        $("#v2ray-alterid-update").click(function () {
            $.ajax({
                type: "POST",
                url: "v2ray-alterid",
                dataType: "json",
                data: {
                    'v2ray-alterid': $("#v2ray-alterid").val()
                },
                success: function (data) {
                    if (data.ret) {
                        $("#ss-msg-success").show();
                        $("#ss-msg-success-p").html(data.msg);
                        setTimeout(function() { history.go(0) }, 1000);
                    } else {
                        $("#ss-msg-error").show();
                        $("#ss-msg-error-p").html(data.msg);
                    }
                },
                error: function (jqXHR) {
                    alert("发生错误：" + jqXHR.status);
                }
            })
        })
    })
</script>


{include file='user/footer.tpl'}
