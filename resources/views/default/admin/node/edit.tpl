{include file='admin/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            编辑节点 #{$node->id}
            <small>Edit Node</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
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
                                    <legend>描述信息</legend>
                                    <div class="form-group">
                                        <label for="type" class="col-sm-3 control-label">是否显示</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="type">
                                                <option value="1" {if $node->type==1}selected="selected"{/if}>显示
                                                </option>
                                                <option value="0" {if $node->type==0}selected="selected"{/if}>隐藏
                                                </option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="status" class="col-sm-3 control-label">节点状态</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" id="status" value="{$node->status}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="sort" class="col-sm-3 control-label">排序</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" id="sort" type="number" value="{$node->sort}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="info" class="col-sm-3 control-label">节点描述</label>

                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="info" rows="3">{$node->info}</textarea>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="col-sm-6">
                                    <legend>连接信息</legend>
                                    <div class="form-group">
                                        <label for="title" class="col-sm-3 control-label">节点名称</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" id="name" value="{$node->name}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="server" class="col-sm-3 control-label">节点地址</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" id="server" value="{$node->server}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="method" class="col-sm-3 control-label">加密方式</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="method">
                                            {foreach $method as $cipher}
                                               <option value="{$cipher}" {if $node->method==$cipher}selected="selected"{/if} >{$cipher}</option>
                                            {/foreach}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="rate" class="col-sm-3 control-label">流量比例</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" id="rate" value="{$node->traffic_rate}">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="method" class="col-sm-3 control-label">自定义加密</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="custom_method">
                                                <option value="0" {if $node->custom_method==0}selected="selected"{/if}>
                                                    不支持
                                                </option>
                                                <option value="1" {if $node->custom_method==1}selected="selected"{/if}>
                                                    支持
                                                </option>
                                            </select>

                                            <p class="help-block">
                                                <a href="https://github.com/orvice/ss-panel/wiki/v3-custom-method">如何使用自定义加密?</a>
                                            </p>
                                        </div>

                                    </div>
                                </fieldset>
                                <fieldset class="col-sm-6">
                                    <legend>SS 特性</legend>
                                    <div class="form-group">
                                        <label for="ss" class="col-sm-3 control-label">SS 特性</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="ss">
                                                <option value="0" {if $node->ss==0}selected={/if}>不支持</option>
                                                <option value="1" {if $node->ss==1}selected={/if}>支持</option>
                                            </select>
                                        </div>
                                    </div>

                                    <legend>SSR 特性</legend>
                                    <div class="form-group">
                                        <label for="ssr" class="col-sm-3 control-label">SSR 特性</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="ssr">
                                                <option value="0" {if $node->ssr==0}selected={/if}>不支持</option>
                                                <option value="1" {if $node->ssr==1}selected={/if}>支持</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="custom_rss" class="col-sm-3 control-label">自定义协议</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="custom_rss">
                                                <option value="0" {if $node->custom_rss==0}selected={/if}>不支持</option>
                                                <option value="1" {if $node->custom_rss==1}selected={/if}>支持</option>
                                            </select>
                                            <p class="help-block">
                                                单端口多用户模式该项无效。
                                            </p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="protocol" class="col-sm-3 control-label">协议</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="protocol">
                                                {foreach $protocol as $protocol_method}
                                                    <option value="{$protocol_method}" {if $node->protocol==$protocol_method}selected="selected"{/if}>{$protocol_method}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="protocol_param" class="col-sm-3 control-label">协议参数</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" id="protocol_param" value="{$node->protocol_param}">
                                            <p class="help-block">
                                                在 auth_chain_* 协议中表示最多允许同时连接的客户端数。
                                            </p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="obfs" class="col-sm-3 control-label">混淆</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="obfs">
                                                {foreach $obfs as $obfs_method}
                                                    <option value="{$obfs_method}" {if $node->obfs==$obfs_method}selected="selected"{/if}>{$obfs_method}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="obfs_param" class="col-sm-3 control-label">混淆参数</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" id="obfs_param" value="{$node->obfs_param}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="ssr_port" class="col-sm-3 control-label">单端口多用户</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" id="ssr_port" value="{$node->ssr_port}">
                                            <p class="help-block">
                                                设置该项为 0 为多端口多用户模式，填入端口号来启用单端口多用户模式。
                                            </p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="add_port_only" class="col-sm-3 control-label">仅使用单端口</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="add_port_only">
                                                <option value="0" {if $node->add_port_only==0}selected={/if}>否</option>
                                                <option value="1" {if $node->add_port_only==1}selected={/if}>是</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="add_method" class="col-sm-3 control-label">单端口多用户加密方式</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="add_method">
                                                {foreach $ssrmethod as $cipher}
                                                    <option value="{$cipher}" {if $node->add_method==$cipher}selected="selected"{/if}>{$cipher}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="add_passwd" class="col-sm-3 control-label">单端口多用户密码</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" id="add_passwd" value="{$node->add_passwd}">
                                        </div>
                                    </div>

                                </fieldset>
                                <fieldset class="col-sm-6">
                                    <legend>V2Ray 特性</legend>
                                    <div class="form-group">
                                        <label for="v2ray" class="col-sm-3 control-label">V2Ray 特性</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="v2ray">
                                                <option value="0" {if $node->v2ray==0}selected={/if}>不支持</option>
                                                <option value="1" {if $node->v2ray==1}selected={/if}>支持</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="v2ray_port" class="col-sm-3 control-label">端口</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" id="v2ray_port" value="{$node->v2ray_port}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="v2ray_protocol" class="col-sm-3 control-label">传输协议</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="v2ray_protocol">
                                                {foreach $v2rayprotocol as $protocol_name => $protocol_method}
                                                    <option value="{$protocol_method}"
                                                            {if $node->v2ray_protocol==$protocol_method}selected="selected"{/if}>
                                                        {$protocol_name}
                                                    </option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="v2ray_path" class="col-sm-3 control-label">WS Path / H2 Path</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" id="v2ray_path" value="{$node->v2ray_path}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="v2ray_tls" class="col-sm-3 control-label">TLS</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="v2ray_tls" value="{$node->v2ray_tls}">
                                                <option value="0" {if $node->v2ray_tls==0}selected={/if}>不启用</option>
                                                <option value="1" {if $node->v2ray_tls==1}selected={/if}>启用</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" id="submit" name="action" value="add" class="btn btn-primary">修改</button>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $(document).ready(function () {
        function submit() {
            $.ajax({
                type: "PUT",
                url: "/admin/node/{$node->id}",
                dataType: "json",
                data: {
                    name: $("#name").val(),
                    server: $("#server").val(),
                    method: $("#method").val(),
                    custom_method: $("#custom_method").val(),
                    custom_rss: $("#custom_rss").val(),
                    rate: $("#rate").val(),
                    info: $("#info").val(),
                    type: $("#type").val(),
                    status: $("#status").val(),
                    sort: $("#sort").val(),
                    ss: $("#ss").val(),
                    ssr: $("#ssr").val(),
                    protocol: $("#protocol").val(),
                    protocol_param: $("#protocol_param").val(),
                    obfs: $("#obfs").val(),
                    obfs_param: $("#obfs_param").val(),
                    ssr_port: $("#ssr_port").val(),
                    add_port_only: $("#add_port_only").val(),
                    add_method: $("#add_method").val(),
                    add_passwd: $("#add_passwd").val(),
                    v2ray: $("#v2ray").val(),
                    v2ray_port: $("#v2ray_port").val(),
                    v2ray_protocol: $("#v2ray_protocol").val(),
                    v2ray_path: $("#v2ray_path").val(),
                    v2ray_tls: $("#v2ray_tls").val(),
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