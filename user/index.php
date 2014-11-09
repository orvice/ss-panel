<?php
include_once 'header.inc.php';
?>
<body>
    <?php include_once 'nav.php'; ?>
        <div class="container-fluid">
          <div class="row">  <?php  include_once 'seliderbar_left.inc.php'; ?>
              <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                  <h2 class="sub-header">用户中心</h2>

                  <div class="table-responsive">
                   <p> 已用流量: <?php if($oo->get_tranfer()<1000000)
                                       {
                                           $transfers=0;}else{ $transfers = $oo->get_tranfer();

                                       }
                    echo $transfers/1000000 ."MB";?> </p>
                   <p> 端口: <code><?php echo $oo->get_port();?></code> </p>
                   <p> 密码: <?php echo $oo->get_pass();?> </p>
                   <p> 套餐: <span class="label label-info"> <?php echo $oo->get_plan();?> </span> </p>
                   <p> 套餐流量: <?php echo $oo->get_transfer_enable()/1000000000 ."GB";?> </p>

                  </div>
              </div>
          </div>
      </div> <!-- #container -->
  <?php include_once 'footer.inc.php'; ?>
  </body>
</html>
