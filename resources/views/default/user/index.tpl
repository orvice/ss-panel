{include file='user/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {$lang->get('user-nav.user-home')}
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- START PROGRESS BARS -->
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="fa fa-bullhorn"></i>

                        <h3 class="box-title">{$lang->get('user-index.announcement')}&{$lang->get('user-index.faq')}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <p><a href="https://down.moe.gr/soft/shadowsocks/">{$lang->get('nav.download')}</a></p>
                       <p>{$msg}</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col (right) -->

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="fa fa-exchange"></i>

                        <h3 class="box-title">{$lang->get('user-index.traffic-info')}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40"
                                         aria-valuemin="0" aria-valuemax="100"
                                         style="width: {$user->trafficUsagePercent()}%">
                                        <span class="sr-only">Transfer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <dl class="dl-horizontal">
                            <dt>{$lang->get('user-index.traffic-total')}</dt>
                            <dd>{$user->enableTraffic()}</dd>
                            <dt>{$lang->get('user-index.traffic-used')}</dt>
                            <dd>{$user->usedTraffic()}</dd>
                            <dt>{$lang->get('user-index.traffic-unused')}</dt>
                            <dd>{$user->unusedTraffic()}</dd>
                        </dl>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col (left) -->

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="fa fa-pencil"></i>

                        <h3 class="box-title">{$lang->get('user-index.checkin')}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <p> 每{$config['checkinTime']}小时可以签到一次。</p>

                        <p>{$lang->get('user-index.last-checkin-at')}：<code>{$user->lastCheckInTime()}</code></p>
                        {if $user->isAbleToCheckin() }
                            <p id="checkin-btn">
                                <button id="checkin" class="btn btn-success  btn-flat">{$lang->get('user-index.checkin')}</button>
                            </p>
                        {else}
                            <p><a class="btn btn-success btn-flat disabled" href="#">{$lang->get('user-index.cant-checkin')}</a></p>
                        {/if}
                        <p id="checkin-msg"></p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col (right) -->

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="fa  fa-paper-plane"></i>

                        <h3 class="box-title">{$lang->get('user-index.connection-info')}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <dl class="dl-horizontal">
                            <dt>{$lang->get('user-index.port')}</dt>
                            <dd>{$user->port}</dd>
                            <dt>{$lang->get('user-index.password')}</dt>
                            <dd>{$user->passwd}</dd>
                            <dt>协议插件</dt>
                            <dd>{$user->protocol}</dd>
                            <dt>混淆插件</dt>
                            <dd>{$user->obfs}</dd>
                            <dt>{$lang->get('user-index.method')}</dt>
                            <dd>{$user->method}</dd>
                            <dt>{$lang->get('user-index.last-used')}</dt>
                            <dd>{$user->lastSsTime()}</dd>
                        </dl>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col (right) -->
        </div>
        <!-- /.row --><!-- END PROGRESS BARS -->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $(document).ready(function () {
        $("#checkin").click(function () {
            $.ajax({
                type: "POST",
                url: "/user/checkin",
                dataType: "json",
                success: function (data) {
                    $("#checkin-msg").html(data.msg);
                    $("#checkin-btn").hide();
                },
                error: function (jqXHR) {
                    alert("发生错误：" + jqXHR.status);
                }
            })
        })
    })
</script>


{include file='user/footer.tpl'}
