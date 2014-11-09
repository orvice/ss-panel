<?php
include_once 'header.inc.php';
?>
<body>
    <?php include_once 'nav.php'; ?>
        <div class="container-fluid">
          <div class="row">  <?php  include_once 'seliderbar_left.inc.php'; ?>
              <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                  <h2 class="sub-header">服务器列表</h2>
                  <div class="table-responsive">
                      <div class="alert alert-info" role="alert">
                          <strong>注意!</strong>  无特殊说明加密方式均为<code>aes-256-cfb</code>
                      </div>
                   <p>一号:  <code>ip</code> </p>

                  </div>
              </div>
          </div>
      </div> <!-- #container -->
  <?php include_once 'footer.inc.php'; ?>
  </body>
</html>
