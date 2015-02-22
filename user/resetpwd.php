<?php
//引入配置文件
require_once '../lib/config.php';
?>
<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="utf-8">
    <title><?php echo $site_name;?>-重置密码</title>
    <!-- bootstrap 3.0.2 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>


<body class="bg-black">

<div class="form-box" id="login-box">

    <div class="header">重置密码</div>

        <div class="body bg-gray">
            <div class="form-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="用户名" required autofocus>
            </div>
            <div class="form-group">
                <input type="text" id="email" name="email" class="form-control" placeholder="邮箱" required>
            </div>

            <div id="info" class="form-group">
            </div>

        </div>
        <div class="footer">
            <button type="submit" id="submit" class="btn bg-olive btn-block"  name="submit" >申请重置</button>
            <a href="login.php">返回登录</a>
        </div>


</div>

<!-- jQuery 2.0.2 -->
<script src="../js/jquery-2.0.3.min.js"></script>
<!-- Bootstrap -->
<script src="../js/bootstrap.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function(){
        $("#submit").click(function(){
            $.ajax({
                type:"GET",
                url:"../lib/Ajax/ResetPwd.php?username="+$("#username").val()+"&email="+$("#email").val(),
                dataType:"json",
                success:function(data){
                    if(data.code){
                        $("#info").html(data.msg);
                    }else{
                        $("#info").html("出现错误："+data.msg);
                    }
                },
                error:function(jqXHR){
                    alert("发生错误："+jqXHR.status);
                }
            })
        })
    })
</script>

</body>

</html>

