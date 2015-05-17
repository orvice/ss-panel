
<footer class="main-footer">
    <div class="pull-right hidden-xs">
         Processed in：<?php
        $Runtime->Stop();
        echo $Runtime->SpendTime()."ms";
        ?>
    </div>
    <strong>Copyright &copy; 2014-<?php echo date('Y'); ?> <a href="#"><?php echo $site_name;  ?></a> </strong>
            All rights reserved.  Powered by  <b>ss-panel</b><?php echo $version; ?>
</footer>
</div><!-- ./wrapper -->
<?php
include_once '../ana.php';
?>

<!-- jQuery 2.1.3 -->
<script src="../asset/js/jQuery.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="../asset/js/bootstrap.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="../asset/plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='../asset/plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="../asset/js/app.min.js" type="text/javascript"></script>
<!-- 下面加载 dataTables 要用的 js 文件 -->
<script src="../asset/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="../asset/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<script type="text/javascript">
  $(function () {
    $("#example1").dataTable();
  });
</script>
</body>
</html>
