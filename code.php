<?php
include_once 'lib/config.php';
include_once 'header.php';
?>
<body>
<div class="container">
    <?php include_once 'nav.php';?>

    <div class="jumbotron">
        <p class="lead"> 邀请码实时刷新</p>
    </div>

    <div class="row marketing">
        <h2 class="sub-header">邀请码</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>###</th>
                    <th>邀请码</th>
                    <th>状态</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $sql = "SELECT * FROM `invite_code` WHERE user = '0' limit 21 ";
                $query = $dbc->query($sql);
                $a = 0;
                while($rs = $query->fetch_array()){
                ?>
                <tr>
                    <td><?php echo $a;$a++; ?></td>
                     <td><?php echo $rs['code'];?></td>
                    <td>可用</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div><?php
    include_once 'footer.php';
    include_once 'ana.php';?>
</div> <!-- /container -->
</body>
</html>
