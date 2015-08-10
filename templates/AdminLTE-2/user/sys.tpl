<{include file='user/main.tpl'}>
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户中心
                <small>User Center</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"><{$site_name}> 统计信息</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="callout callout-warning">
                                <h4>注意！</h4>
                                <p>流量统计仅供参考，在线人数有一小会儿的延迟。</p>
                            </div>
                            <p>当前时间：<{$time}></p>
                            <p>当前版本：<code><{$version}></code></p>
                            <p><{$site_name}> 已经产生流量<code><{$getTrafficGB}></code>GB。</p>
                            <p>注册用户：<code><{$allUserCount}> </code></p>
                            <p>已经有<code><{$activedUserCount}></code>个用户使用了<{$site_name}> 服务。</p>
                            <p>签到用户：<code><{$checkinUser}></code></p>
                            <p>24小时签到用户：<code><{$CheckInUser_24}></code></p>
                            <p>过去1小时在线人数：<code><{$onlineUserCount_1_h}></code>。</p>
                            <p>过去5分钟在线人数：<code><{$onlineUserCount_5_i}></code>。</p>
                            <p>过去1分钟在线人数：<code><{$onlineUserCount_1_i}></code>。</p>
                            <p>实时在线人数：<code><{$onlineUserCount}></code>。</p>
                            <p>过去24小时在线人数：<code><{$onlineUserCount_24_h}></code>。</p>
                        </div><!-- /.box -->
                    </div>
                </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<{include file='Public_javascript.tpl'}>
<!-- 在下面添加功能引用的js -->

<{include file='user/footer.tpl'}>