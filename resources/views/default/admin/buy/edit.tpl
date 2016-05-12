{include file='admin/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            编辑订单
            <small>Edit Order</small>
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
                                    <legend>订单信息</legend>
                                    <div class="form-group">
                                        <label for="title" class="col-sm-3 control-label">购买用户</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" readonly="readonly" id="name_id" value="{$res['buy']->nickName}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="method" class="col-sm-3 control-label">购买套餐</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" readonly="readonly" id="package_id" value="{$res['buy']->packageName}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="server" class="col-sm-3 control-label">订单状态</label>


                                        <div class="col-sm-9">
                                            <select class="form-control" id="status">
                                                <option value="0" {if $res['buy']->status==0}selected="selected"{/if} >
                                                    未支付
                                                </option>
                                                <option value="1" {if $res['buy']->status==1}selected="selected"{/if} >
                                                    代发货
                                                </option>
                                                <option value="2" {if $res['buy']->status==2}selected="selected"{/if} >
                                                    已完成
                                                </option>
                                                <option value="3" {if $res['buy']->status==3}selected="selected"{/if} >
                                                    已作废
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="rate" class="col-sm-3 control-label">关联服务器</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="node_id">
                                                <option value="" {if empty($res['buy']->node_id)}selected="selected"{/if} >请分配服务器</option>
                                                {foreach $res['node'] as $node}
                                                <option value="{$node->id}" {if $res['buy']->node_id == $node->id}selected="selected"{/if} >
                                                    {$node->name}
                                                </option>
                                                {/foreach}
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="method" class="col-sm-3 control-label">服务器状态</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" readonly="readonly" id="package_id" value="{$res['buy']->serverStatus}(服务器状态请到节点处修改)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="method" class="col-sm-3 control-label">订单备注</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="remark" value="{$res['buy']->remark}">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" id="submit" name="action" value="edit" class="btn btn-primary">保存</button>
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
                type: "PUT",
                url: "/admin/buy/{$res['buy']->id}",
                dataType: "json",
                data: {
                    status: $("#status").val(),
                    node_id: $("#node_id").val(),
                    remark: $("#remark").val(),
                },
                success: function (data) {
                    if (data.ret) {
                        $("#msg-error").hide(100);
                        $("#msg-success").show(100);
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='/admin/buy'", 2000);
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