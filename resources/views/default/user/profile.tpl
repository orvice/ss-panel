{include file='user/main.tpl'}

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            我的信息
            <small>User Profile</small>
        </h1>
    </section>
    <!-- Main content --><!-- Main content -->
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
                    <h4><i class="icon fa fa-info"></i> 成功!</h4>

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
                        <i class="fa fa-asterisk"></i>

                        <h3 class="box-title">冻结帐号</h3>
                    </div>
                    <div class="box-body">
                        {if !$user->freeze}
                            <div id="msg-info" class="alert alert-info">
                                <p>
                                    在你不需要使用的时候可以冻结你的账户，冻结期间你的续费时长不会扣除！
                                </p>
                            </div>
                            <div id="msg-info" class="alert alert-warning">
                                <p>
                                    不过，你需要至少保持冻结一个月才会被延期！
                                </p>
                            </div>
                        {else}
                            <div id="msg-info" class="alert alert-warning">
                                <p>
                                    你需要至少保持冻结 30 天才会被延期！
                                </p>
                            </div>
                            <dl class="dl-horizontal">
                                <dt>冻结开始时间</dt>
                                <dd>{$user->lastFreezeTime()}</dd>
                                <dt>已冻结时间</dt>
                                <dd>{$user->frozenTime()}</dd>
                            </dl>
                        {/if}

                    </div>
                    <div class="box-footer">
                        {if $user->enable}
                            <button id="freeze_btn" class="btn btn-primary btn-sm">冻结我的账户</button>
                        {elseif $user->freeze}
                            <button id="freeze_btn" class="btn btn-primary btn-sm">解冻我的账户</button>
                        {else}
                            <button id="freeze_btn" class="btn btn-primary disabled btn-sm">您尚未激活</button>
                        {/if}
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="fa fa-user"></i>

                        <h3 class="box-title">我的帐号</h3>
                    </div>
                    <div class="box-body">
                        <dl class="dl-horizontal">
                            <dt>用户名</dt>
                            <dd>{$user->user_name}</dd>
                            <dt>邮箱</dt>
                            <dd>{$user->email}</dd>
                        </dl>

                    </div>
                    <div class="box-footer">
                        <a class="btn btn-danger btn-sm" href="kill">删除我的账户</a>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $(document).ready(function () {
        $("#freeze_btn").click(function () {
            $.ajax({
                type: "POST",
                url: "freeze",
                dataType: "json",
                success: function (data) {
                    if (data.ret) {
                        $("#ss-msg-success").show();
                        $("#ss-msg-success-p").html(data.msg);
                        window.setTimeout("history.go(0)", 2000);
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