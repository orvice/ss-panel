<?php
require_once '_main.php';

//获得流量信息
if($oo->get_transfer()<1000000)
{
    $transfers=0;}else{ $transfers = $oo->get_transfer();

}
//计算流量并保留2位小数
$all_transfer = $oo->get_transfer_enable()/$togb;
$unused_transfer =  $oo->unused_transfer()/$togb;
$used_100 = $oo->get_transfer()/$oo->get_transfer_enable();
$used_100 = round($used_100,2);
$used_100 = $used_100*100;
//计算流量并保留2位小数
$transfers = $transfers/$tomb;
$transfers = round($transfers,2);
$all_transfer = round($all_transfer,2);
$unused_transfer = round($unused_transfer,2);
//最后在线时间
$unix_time = $oo->get_last_unix_time();
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
            <!-- START PROGRESS BARS -->
            <div class="row">
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header with-border">
                          <h3 class="box-title">公告</h3>
                          <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="最小化"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="关闭"><i class="fa fa-times"></i></button>
                          </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="callout">
                                <h4 class="callout callout-warning">极为重要：请勿在网络上公开讨论本站的存在。</h4>
                                <ul>
                                    <li>请勿将邀请码与本站网址公开发布在网络上，请通过一对一私密的方式传播；</li>
                                    <li>请勿用自己的邀请码注册小号。</li>
                                </ul>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box1 -->

                    <div class="box">
                        <div class="box-header with-border">
                          <h3 class="box-title">通知</h3>
                          <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="最小化"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="关闭"><i class="fa fa-times"></i></button>
                          </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="callout">
                                <p><strong>为了使本站服务器资源得到充分利用，请熟知以下账号删除规则：</strong></p>
                                <ol class="list">
                                    <li>大于30天未签到；</li>
                                    <li>同时连接使用设备超过6；</li>
                                    <li>一人多号。</li>
                                </ol>
                                <p><span>满足以上三个任意条件的账号将会被删除。</span></p>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box2 -->

                    <div class="box">
                        <div class="box-header with-border">
                          <h3 class="box-title">微信群</h3>
                          <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="最小化"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="关闭"><i class="fa fa-times"></i></button>
                          </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <center><img src="images/weixin513.png" width="168" height="168" border="0"></center>
                            <br><br>
                            <p class="text-green"><strong>微信（WeChat）扫描二维码加入微信群，与大伙儿一起交流科学上网界的稀奇事儿。</strong></p>
                            <p>目前为“群4”，为避免群聊带来的打扰，请勿重复加入。</p>
                        </div><!-- /.box-body -->
                    </div><!-- /.box3 -->

                </div><!-- /.col (left) -->

                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">流量使用情况</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p> 已用流量: <?php echo $transfers."MB";?> </p>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $used_100; ?>%">
                                    <span class="sr-only">Transfer</span>
                                </div>
                            </div>
                            <p> 可用流量: <?php echo $all_transfer ."GB";?> </p>
                            <p> 剩余流量: <?php echo  $unused_transfer."GB";?> </p>
                        </div><!-- /.box-body -->
                    </div><!-- /.box1 -->

                    <div class="box box-success">
                        <div class="box-body">
                            <p class="text-green" style="font-size: 1.33em"> <strong><script src="/lib/words.js" type="text/javascript"></script></strong> </p>
                        </div><!-- /.box-body -->
                    </div><!-- /.box2 -->

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">签到获取流量</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p> 22小时内可以签到一次</p>
                            <?php  if($oo->is_able_to_check_in())  { ?>
                                <p id="checkin-btn"> <button id="checkin" class="btn btn-success  btn-flat">签到</button></p>
                            <?php  }else{ ?>
                                <p><a class="btn btn-success btn-flat disabled" href="#">不能签到</a> </p>
                            <?php  } ?>
                            <p id="checkin-msg" ></p>
                            <p>上次签到时间<code><?php echo date('Y-m-d H:i:s',$oo->get_last_check_in_time());?></code></p>
                        </div><!-- /.box-body -->
                    </div><!-- /.box3 -->

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">连接信息</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p> 端口: <code><?php echo $oo->get_port();?></code> </p>
                            <p> 密码: <?php echo $oo->get_pass();?> </p>
                            <p> 最后使用时间: <code><?php echo date('Y-m-d H:i:s',$unix_time);  ?></code> </p>
                        </div><!-- /.box-body -->
                    </div><!-- /.box4 -->

                </div><!-- /.col (right) -->

            </div><!-- /.row -->
            <!-- END PROGRESS BARS -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php
require_once '_footer.php'; ?>

<script>
    $(document).ready(function(){
        $("#checkin").click(function(){
            $.ajax({
                type:"GET",
                url:"_checkin.php",
                dataType:"json",
                success:function(data){
                    $("#checkin-msg").html(data.msg);
                    $("#checkin-btn").hide();
                },
                error:function(jqXHR){
                    alert("发生错误："+jqXHR.status);
                }
            })
        })
    })
</script>

