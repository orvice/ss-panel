<?php
include_once 'header.inc.php';
if($oo->get_transfer()<1000000)
{
    $transfers=0;}else{ $transfers = $oo->get_transfer();

}
//计算流量并保留2位小数
$transfers = $transfers/$tomb;
$transfers = round($transfers,2);
$all_transfer = $oo->get_transfer_enable()/$togb;
$all_transfer = round($all_transfer,2);
$unused_transfer =  $oo->unused_transfer()/$togb;
$unused_transfer = round($unused_transfer,2);
?>
<body>
    <?php include_once 'nav.php'; ?>
        <div class="container-fluid">
          <div class="row">  <?php  include_once 'seliderbar_left.inc.php'; ?>
              <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                  <h2 class="sub-header">用户中心</h2>
                  <div class="alert alert-info" role="alert">
                      <strong>公告!</strong>  <a href="https://cattt.com/bbs/viewtopic.php?f=3&t=12">第一批未产生流量的用户已经清理</a>
                  </div>
                  <div class="table-responsive">
                   <p> 已用流量: <?php echo $transfers."MB";?> </p>
                   <p> 端口: <code><?php echo $oo->get_port();?></code> </p>
                   <p> 密码: <?php echo $oo->get_pass();?> </p>
                   <p> 套餐: <span class="label label-info"> <?php echo $oo->get_plan();?> </span> </p>
                   <p> 可用流量: <?php echo $all_transfer ."GB";?> </p>
                   <p> 剩余流量: <?php echo  $unused_transfer."GB";?> </p>
                   <p> 账户余额: <?php echo $oo->get_money();?>元</p>
                  </div>
              </div>
          </div>
      </div> <!-- #container -->
  <?php include_once 'footer.inc.php'; ?>
  </body>
</html>
