{include file='admin/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            编辑套餐
            <small>Edit Package</small>
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
                                    <legend>套餐信息</legend>
                                    <div class="form-group">
                                        <label for="title" class="col-sm-3 control-label">套餐名称</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" id="name" value="{$package->name}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="method" class="col-sm-3 control-label">套餐类型</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="server">
                                                <option value="0" {if $package->server=='0'} selected="selected" {/if} >
                                                    独立专线服务器
                                                </option>
                                                <option value="1" {if $package->server=='1'} selected="selected" {/if} >
                                                    共享流量服务器
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="server" class="col-sm-3 control-label">套餐流量</label>

                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input class="form-control" id="flow" value="{$package->flow}">
                                                <div class="input-group-addon">GIB</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="method" class="col-sm-3 control-label">收入类型</label>

                                        <div class="col-sm-9">
                                            <select class="form-control" id="money_type">
                                                <option value="USD" {if $package->money_type=='USD'} selected="selected" {/if}>
                                                    USD(美元)
                                                </option>
                                                <option value="RMB" {if $package->money_type=='RMB'} selected="selected" {/if} >
                                                    RMB(人民币)
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="rate" class="col-sm-3 control-label">套餐价格</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" id="money" value="{$package->money}">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="method" class="col-sm-3 control-label">套餐介绍</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="desc" value="{$package->desc}">
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
                url: "/admin/package/{$package->id}",
                dataType: "json",
                data: {
                    name: $("#name").val(),
                    flow: $("#flow").val(),
                    server: $("#server").val(),
                    money_type: $("#money_type").val(),
                    money: $("#money").val(),
                    desc: $("#desc").val(),
                },
                success: function (data) {
                    if (data.ret) {
                        $("#msg-error").hide(100);
                        $("#msg-success").show(100);
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='/admin/package'", 2000);
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