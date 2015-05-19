<?php
require_once '_main.php';
$ssmin = new \Ss\Etc\Ana();
?>

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
                            <h3 class="box-title"><?php echo $site_name; ?> 统计信息</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="callout callout-warning">
                                <h4>注意！</h4>
                                <p>流量统计仅供参考，在线人数有一小会儿的延迟。</p>
                            </div>
                            <p>当前时间：<?php  echo  date("Y-m-d H:i",time()); ?></p>
			                <p>当前版本：<code><?php echo $version; ?></code></p>
                            <p><?php echo $site_name;  ?>已经产生流量<code><?php echo $ssmin->getTrafficGB(); ?></code>GB。</p>
                            <p>注册用户：<code><?php echo $ssmin->user_all_count();?> </code></p>
                            <p>已经有<code><?php echo $ssmin->user_active_count();?></code>个用户使用了<?php echo $site_name; ?>服务。</p>
                            <p>签到用户：<code><?php echo   $ssmin->CheckInUser(time()); ?></code></p>
                            <p>24小时签到用户：<code><?php echo   $ssmin->CheckInUser(3600*24); ?></code></p>
                            <p>过去1小时在线人数：<code><?php echo $ssmin->user_time_count(3600);?></code>。</p>
                            <p>过去5分钟在线人数：<code><?php echo $ssmin->user_time_count(300);?></code>。</p>
                            <p>过去1分钟在线人数：<code><?php echo $ssmin->user_time_count(60);?></code>。</p>
                            <p>实时在线人数：<code><?php echo $ssmin->user_time_count(10);?></code>。</p>
                            <p>过去24小时在线人数：<code><?php echo $ssmin->user_time_count(3600*24);?></code>。</p>
                        </div><!-- /.box -->
                    </div>
                </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php
require_once '_footer.php'; ?>
