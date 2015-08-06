<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><{$site_name}></title>
    <!-- Bootstrap core CSS -->
    <link href="<{$resources_dir}>/asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<{$resources_dir}>/asset/css/flat-ui.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<{$resources_dir}>/asset/css/sticky-footer-navbar.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
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
            <a class="navbar-brand" href="../"><{$site_name}></a>
        </div>

    </div>
</nav>

<!-- Begin page content -->
<div class="container">
    <div class="page-header">
        <h1>用户协议 Terms of Service </h1>
    </div>
    <p><{$site_name}>，<{$tos_content}></p>
</div>

<footer class="footer">
    <div class="container">
        <p class="text-muted"><strong>Copyright &copy; <{date('Y')}> <a href="#"><{$site_name}></a>.</strong> All rights reserved. Powered by  <b>ss-panel</b> <{$version}> </p>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<{$resources_dir}>/asset/js/jQuery.min.js"></script>
<script src="<{$resources_dir}>/asset/js/bootstrap.min.js"></script>
<!-- 选择风格模板 -->
<script>
    (function() { 
    function async_load(){ 
        var arryAll = [];  
        // 异步加载的js文件
        arryAll.push("<{$resources_dir}>/asset/js/templates.js");  
        // arryAll.push("<{$resources_dir}>/asset/js/*.js"); 
        arryAll.forEach(function(e){ 
            var s = document.createElement('script'); 
            s.type = 'text/javascript'; 
            s.async = true; 
            var x = document.getElementsByTagName('script')[0];
            s.src = e; 
            x.parentNode.insertBefore(s, x); 
        })  
    } 
    if (window.attachEvent) {
    window.attachEvent('onload', async_load); 
    }else {
    window.addEventListener('load', async_load, false);
    } 
    })(); 
</script>
</body>
</html>