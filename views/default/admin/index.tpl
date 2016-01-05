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
                        <h3 class="box-title">公告&FAQ</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <p>流量不会重置，可以通过签到获取流量。</p>
                        <p>流量可以通过签到获取，基本每天可以用1G流量。</p>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col (right) -->

            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title">流量使用情况</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="progress progress-striped">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {$user->trafficUsagePercent()}%">
                                <span class="sr-only">Transfer</span>
                            </div>
                        </div>
                        <p> 总流量:{$user->enableTraffic()}</p>
                        <p> 已用流量：{$user->usedTraffic()}  </p>
                        <p> 剩余流量： {$user->unusedTraffic()} </p>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col (left) -->

        </div><!-- /.row -->
        <!-- END PROGRESS BARS -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->




{include file='admin/footer.tpl'}