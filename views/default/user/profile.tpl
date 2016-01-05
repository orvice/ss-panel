{include file='user/main.tpl'}

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            个人资料
            <small>Profile</small>
        </h1>
    </section>
    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-body">
                        <p>用户名：{$user->user_name}</p>
                        <p>邮箱：{$user->email}</p>
                        <p><a class="btn btn-danger btn-sm" href="kill">删除我的账户</a></p>
                    </div><!-- /.box -->
                </div>
            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
{include file='user/footer.tpl'}