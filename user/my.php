<?php
include_once 'header.inc.php';
?>
<body>
    <?php include_once 'nav.php'; ?>
        <div class="container-fluid">
          <div class="row">  <?php  include_once 'seliderbar_left.inc.php'; ?>
              <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                  <h2 class="sub-header">我的信息</h2>
                  <div class="table-responsive">
                   <p>用户名: <?php echo $user_name; ?></p>
                   <p>邮箱: <?php echo get_user_email($uid);  ?></p>
                   <p> 套餐: <span class="label label-info"> <?php echo $oo->get_plan();?> </span> </p>
                  </div>
              </div>
          </div>
      </div> <!-- #container -->
  <?php include_once 'footer.inc.php'; ?>
  </body>
</html>
