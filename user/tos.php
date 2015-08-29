<?php
require_once '../lib/config.php';
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $site_name;  ?></title>
    <!-- Bootstrap core CSS -->
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/css/flat-ui.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../asset/css/sticky-footer-navbar.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo $site_name;  ?></a>
        </div>

    </div>
</nav>

<!-- Begin page content -->
<div class="container">
    <div class="page-header">
        <h1>用户协议 Terms of Service </h1>
    </div>
    <p><?php echo $site_name;  ?>，以下简称本站。</p>
    <h3>隐私</h3>
    <p>
        <ul>
            <li>用户注册时候需要提供邮箱以及密码，并自行保管。邮箱为用户的唯一凭证。</li>
            <li>本站会加密存储用户密码，尽量保证数据安全，但并不保证这些信息的绝对安全。</li>
        </ul>
    </p>

    <h3>使用条款</h3>
    <p>
        <ul>
            <li>禁止使用本站服务进行任何违法恶意活动。</li>
            <li>使用任何节点，需遵循节点所属国家的相关法律以及中国法律。</li>
            <li>禁止滥用本站提供的服务。</li>
            <li>对于免费用户，我们有权在不通知的情况下删除账户。</li>
            <li>任何违法使用条款的用户，我们将会删除违规账户并没收使用本站服务的权利。</li>
       </ul>
    </p>

    <h3>其它</h3>
    <p>
    <ul>
        <li>本站仅限人类及猫注册使用。</li>
        <li>TOS更新时用户需要遵守最新TOS。</li>
    </ul>
    </p>

</div>

<footer class="footer">
    <div class="container">
        <p class="text-muted"><strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#"><?php echo $site_name;  ?></a>.</strong> All rights reserved. Powered by  <b>ss-panel</b> <?php echo $version; ?> </p>
    </div>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../asset/js/jQuery.min.js"></script>
<script src="../asset/js/bootstrap.min.js"></script>

</body>
</html>
