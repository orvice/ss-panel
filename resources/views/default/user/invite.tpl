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
                            <button id="invite" class="btn btn-sm btn-info">生成我的邀请码</button>
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
                    <h4>注意！</h4>

                    <p>邀请码请给认识的需要的人。</p>

                    <p>邀请有记录，若被邀请的人违反用户协议，您将会有连带责任。</p>
                </div>

                <div class="callout callout-info">
                    <h4>说明</h4>

                    <p>用户注册48小时后，才可以生成邀请码。</p>

                    <p>邀请码暂时无法购买，请珍惜。</p>

                    <p>公共页面不定期发放邀请码，如果用完邀请码可以关注公共邀请。</p>
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