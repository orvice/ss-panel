{include file='admin/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            管理面板
            <small>Admin Control</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- START PROGRESS BARS -->
        <div class="row">
            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title">站点统计</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <p> 总用户: {$sts->getTotalUser()}</p>
                        <p> 签到用户: {$sts->getCheckinUser()} </p>
                        <p> 产生流量: {$sts->getTrafficUsage()}</p>
                        <p> 1小时在线用户: {$sts->getOnlineUser(3600)}</p>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col (right) -->



        </div><!-- /.row -->
        <!-- END PROGRESS BARS -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->




{include file='admin/footer.tpl'}