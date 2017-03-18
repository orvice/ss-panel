{include file='admin/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            发送邮件
            <small>Send Mail</small>
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
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-horizontal">
                            <div class="row">
                                <fieldset class="col-sm-12">
                                    <legend>发送通知邮件</legend>
                                    <div class="form-group">
                                        <label for="who" class="col-sm-3 control-label">收件人</label>

                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <select class="form-control" id="who">
                                                    <option value="all">全体</option>
                                                    <option value="active">活动的用户</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subject" class="col-sm-3 control-label">主题</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" id="subject" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="text" class="col-sm-3 control-label">内容</label>

                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="text" value=""></textarea>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" id="submit" name="action" value="add" class="btn btn-primary">发送通知邮件
                        </button>
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
                url: "/admin/sendmail",
                dataType: "json",
                data: {
                    who: $("#who").val(),
                    subject: $("#subject").val(),
                    text: $("#text").val()
                },
                success: function (data) {
                    console.log(data);
                    $("#msg-error").hide(100);
                    $("#msg-success").show(100);
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