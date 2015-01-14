<?php
include_once 'lib/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $site_name; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
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
