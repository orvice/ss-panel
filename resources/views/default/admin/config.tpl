{include file='admin/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            站点配置
            <small>App Config</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div id="msg-success" class="alert alert-info alert-dismissable" style="display: none;">
                    <button type="button" class="close" id="ok-close" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-info"></i> 成功!</h4>

                    <p id="msg-success-p"></p>
                </div>

            </div>
        </div>
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">修改配置</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <form role="form">
                            <div class="form-group">
                                <label>网站名</label>
                                <input type="text" class="form-control" placeholder="Enter ..." id="app-name"
                                       value="{$conf['app-name']}">
                            </div>

                            <div class="form-group">
                                <label>统计代码</label>
                                <textarea class="form-control" id="analytics-code" rows="3"
                                          placeholder="Enter ...">{$conf['analytics-code']}</textarea>
                            </div>

                            <div class="form-group">
                                <label>邀请页公告</label>
                                <textarea class="form-control" id="home-code" rows="3"
                                          placeholder="Enter ...">{$conf['home-code']}</textarea>
                            </div>

                            <div class="form-group">
                                <label>用户中心公告</label>
                                <textarea class="form-control" id="user-index" rows="3"
                                          placeholder="Enter ...">{$conf['user-index']}</textarea>
                            </div>

                            <div class="form-group">
                                <label>用户节点公告</label>
                                <textarea class="form-control" id="user-node" rows="3"
                                          placeholder="Enter ...">{$conf['user-node']}</textarea>
                            </div>

                        </form>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button id="update" type="submit" name="update" value="update" class="btn btn-primary">更新配置
                        </button>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">其他信息</h3>
                    </div>
                    <div class="box-footer">
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
        $("#update").click(function () {
            $.ajax({
                type: "POST",
                url: "/admin/config",
                dataType: "json",
                data: {
                    analyticsCode: $("#analytics-code").val(),
                    homeCode: $("#home-code").val(),
                    appName: $("#app-name").val(),
                    userIndex: $("#user-index").val(),
                    userNode: $("#user-node").val()
                },
                success: function (data) {
                    if (data.ret) {
                        $("#msg-success").show(100);
                        $("#msg-success-p").html(data.msg);
                        //window.setTimeout("location.href='/admin/invite'", 2000);
                    }
                    // window.location.reload();
                },
                error: function (jqXHR) {
                    alert("发生错误：" + jqXHR.status);
                }
            })
        })
    })
</script>

{include file='admin/footer.tpl'}
