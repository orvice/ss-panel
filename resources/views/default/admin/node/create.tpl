{include file='admin/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            添加节点
            <small>Add Node</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div id="msg-success" class="alert alert-success alert-dismissable" style="display: none;">
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
        </div>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-horizontal">
                            <div class="row">
                                <fieldset class="col-sm-6">
                                    <legend>连接信息</legend>
                                    <div class="form-group">
                                        <label for="title" class="col-sm-3 control-label">节点名称</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" id="name" value="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="server" class="col-sm-3 control-label">节点地址</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" id="server" value="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="protocol" class="col-sm-3 control-label">协议插件</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="protocol">
                                                <option value="" ></option>
                                                <option value="origin" >origin</option>
                                                <option value="verify_simple" >verify_simple</option>
                                                <option value="verify_deflate" >verify_deflate</option>
                                                <option value="verify_sha1" >verify_sha1</option>
                                                <option value="auth_simple" >auth_simple</option>
                                                <option value="auth_sha1" >auth_sha1</option>
                                                <option value="auth_sha1_compatible" >auth_sha1_compatible</option>
                                                <option value="auth_sha1_v2" >auth_sha1_v2</option>
                                                <option value="auth_sha1_v2_compatible">auth_sha1_v2_compatible</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="obfs" class="col-sm-3 control-label">混淆插件</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="obfs">
                                                <option value="" ></option>
                                                <option value="plain" >plain</option>
                                                <option value="http_simple" >http_simple</option>
                                                <option value="http_simple_compatible" >http_simple_compatible</option>
                                                <option value="tls_simple" >tls_simple</option>
                                                <option value="random_head" >random_head</option>
                                                <option value="tls1.0_session_auth" >tls1.0_session_auth</option>
                                                <option value="tls1.0_session_auth_compatible" >tls1.0_session_auth_compatible</option>
                                                <option value="tls1.2_ticket_auth" >tls1.2_ticket_auth</option>
                                                <option value="tls1.2_ticket_auth_compatible" >tls1.2_ticket_auth_compatible</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="method" class="col-sm-3 control-label">加密方式</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="method">
                                                <option value=""></option>
                                                <option value="rc4-md5">rc4-md5</option>
                                                <option value="aes-256-cfb">aes-256-cfb</option>
                                                <option value="chacha20">chacha20</option>
                                                <option value="chacha20-ietf">chacha20-ietf</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="rate" class="col-sm-3 control-label">流量比例</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" id="rate" value="1">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="method" class="col-sm-3 control-label">自定义加密</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="custom_method">
                                                <option value="0" selected="selected">
                                                    不支持
                                                </option>
                                                <option value="1">
                                                    支持
                                                </option>
                                            </select>

                                            <p class="help-block">
                                                <a href="https://github.com/orvice/ss-panel/wiki/v3-custom-method">如何使用自定义加密?</a>|
                                                <a href="https://github.com/orvice/ss-panel/wiki/v3-traffic-rate">如何设置流量比例?</a>
                                            </p>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label for="custom_rss" class="col-sm-3 control-label">自定义协议&混淆</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="custom_rss">
                                                <option value="0" selected="selected">
                                                    不支持
                                                </option>
                                                <option value="1">
                                                    支持
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                </fieldset>
                                <fieldset class="col-sm-6">
                                    <legend>描述信息</legend>
                                    <div class="form-group">
                                        <label for="type" class="col-sm-3 control-label">是否显示</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="type">
                                                <option value="1" selected="selected">显示</option>
                                                <option value="0">隐藏</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="status" class="col-sm-3 control-label">节点状态</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="status">
                                                <option value=""></option>
                                                <option value="可用">可用</option>
                                                <option value="不可用">不可用</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="sort" class="col-sm-3 control-label">排序</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" id="sort" type="number" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="info" class="col-sm-3 control-label">节点描述</label>

                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="info" rows="3"></textarea>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" id="submit" name="action" value="add" class="btn btn-primary">添加</button>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $(document).ready(function () {
        function submit() {
            $.ajax({
                type: "POST",
                url: "/admin/node",
                dataType: "json",
                data: {
                    name: $("#name").val(),
                    server: $("#server").val(),
                    protocol: $("#protocol").val(),
                    obfs: $("#obfs").val(),
                    method: $("#method").val(),
                    custom_method: $("#custom_method").val(),
                    rate: $("#rate").val(),
                    info: $("#info").val(),
                    type: $("#type").val(),
                    status: $("#status").val(),
                    sort: $("#sort").val(),
					custom_rss: $("#custom_rss").val()
 					//{if $config['enable_rss']=="true"},
					//custom_rss: custom_rss{else},
					//custom_rss: 0
					//{/if}
                },
                success: function (data) {
                    if (data.ret) {
                        $("#msg-error").hide(100);
                        $("#msg-success").show(100);
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='/admin/node'", 2000);
                    } else {
                        $("#msg-error").hide(10);
                        $("#msg-error").show(100);
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error: function (jqXHR) {
                    $("#msg-error").hide(10);
                    $("#msg-error").show(100);
                    $("#msg-error-p").html("发生错误：" + jqXHR.status);
                }
            });
        }

        $("html").keydown(function (event) {
            if (event.keyCode == 13) {
                login();
            }
        });
        $("#submit").click(function () {
            submit();
        });
        $("#ok-close").click(function () {
            $("#msg-success").hide(100);
        });
        $("#error-close").click(function () {
            $("#msg-error").hide(100);
        });
    })
</script>


{include file='admin/footer.tpl'}
