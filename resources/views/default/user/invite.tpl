{include file='user/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            邀请
            <small>Invite</small>
        </h1>
    </section>

    <!-- Main content --><!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div id="msg-error" class="alert alert-warning alert-dismissable" style="display:none">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> 出错了!</h4>

                    <p id="msg-error-p"></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="msg-info" class="alert alert-info">
                    <h4>
                        <i class="icon fa fa-info"></i>
                        你知道吗？被你介绍的朋友在第一次充值的时候可以获得15天的额外时长，你自己也可以获得15天的时长返利！
                    </h4>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="fa fa-rocket"></i>

                        <h3 class="box-title">邀请</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <p>当前您可以生成<code>{$user->invite_num}</code>个邀请码。 </p>
                        {if $user->invite_num }
                            <div class="input-group">
                                <input class="form-control" id="num" type="number" placeholder="要生成的邀请码数量">
                                <div class="input-group-btn">
                                    <button id="invite" class="btn btn-info">生成我的邀请码</button>
                                </div>
                            </div>
                        {/if}
                    </div>
                    <!-- /.box -->
                    <div class="box-header">
                        <h3 class="box-title">我的邀请码</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>###</th>
                                <th>邀请码(点右键复制链接)</th>
                                <th>状态</th>
                            </tr>
                            </thead>
                            <tbody>
                            {foreach $codes as $code}
                                <tr>
                                    <td><b>{$code->id}</b></td>
                                    <td><a href="/auth/register?code={$code->code}" target="_blank">{$code->code}</a>
                                    </td>
                                    <td>可用</td>
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="callout callout-warning">
                    <h4>说明</h4>

                    <p>邀请码请给认识的需要的人。</p>

                    <p>用户注册48小时后，才可以生成邀请码。</p>
                </div>

                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header">
                        <i class="fa fa-users"></i>
                        <h3 class="box-title">邀请的朋友</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>##</th>
                                <th>用户名</th>
                                <th>状态</th>
                                <th>注册时间</th>
                                <th>上次续费时间</th>
                            </tr>
                            {foreach $refBys as $refBy}
                                <tr>
                                    <td>#{$refBy->id}</td>
                                    <td>{$refBy->user_name}</td>
                                    <td>
                                        {if $refBy->lastGetGiftTime() == "从未充值"}
                                            还未充值哦&gt;_&lt;
                                        {else}
                                            已返利o(*￣▽￣*)ブ
                                        {/if}
                                    </td>
                                    <td>{$refBy->reg_date}</td>
                                    <td>{$refBy->lastGetGiftTime()}</td>
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div>

            </div>
            <!-- /.col (right) -->
        </div>
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $(document).ready(function () {
        $("#invite").click(function () {
            $.ajax({
                type: "POST",
                url: "/user/invite",
                dataType: "json",
                data: {
                    num: $("#num").val()
                },
                success: function (data) {
                    window.location.reload();
                },
                error: function (jqXHR) {
                    alert("发生错误：" + jqXHR.status);
                }
            })
        })
    })
</script>

{include file='user/footer.tpl'}