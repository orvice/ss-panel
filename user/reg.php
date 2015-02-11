<?php
include_once '../lib/config.php';
?>
<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="UTF-8">
    <title><?php echo $site_name;?>注册</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
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
    <div class="header"><?php echo $site_name;?>注册</div>
    <form name="reg" role="form" action="doreg.php" method="post" onsubmit="return regcheck()" >
        <div class="body bg-gray">
            <div class="form-group">
                <input type="text" name="username" class="form-control" value="<?php echo $_COOKIE['reg_name'];?>"  placeholder="用户名" >
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="密码" >
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="repassword" placeholder="重复密码" >
            </div>


            <div class="form-group">
                <input type="text" name="email" class="form-control" id="Email" value="<?php echo $_COOKIE['reg_email'];?>" placeholder="邮箱" >
            </div>

            <?php if($invite_only){ ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="code" value="<?php echo $_COOKIE['reg_code'];?>"  placeholder="邀请码" >
                </div>
            <?php } ?>
        </div>
        <div class="footer">

            <button type="submit" class="btn bg-olive btn-block">注册</button>

            <a href="login.php" class="text-center">已经注册？请登录</a>
        </div>
    </form>

    <div class="margin text-center">
        <span>下面的按钮暂时是不可用的</span>
        <br/>
        <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
        <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
        <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

    </div>
</div>


<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../js/bootstrap.min.js" type="text/javascript"></script>

<script LANGUAGE="javascript">

    function regcheck()
    {
        if(document.reg.username.value.length==0){
            alert("请输入用户名");
            document.reg.username.focus();
            return false;
        }

        if(document.reg.username.value.length < 6){
            alert("用户名长度至少6位");
            document.reg.username.focus();
            return false;
        }

        if(document.reg.password.value.length==0){
            alert("请输入密码!");
            document.reg.password.focus();
            return false;
        }

        if(document.reg.password.value.length < 8){
            alert("密码长度至少8位!");
            document.reg.password.focus();
            return false;
        }

        if(document.reg.repassword.value.length==0){
            alert("请重复输入密码!");
            document.reg.repassword.focus();
            return false;
        }

        if(document.reg.repassword.value != document.reg.password.value ){
            alert("两次密码输入不符!");
            document.reg.repassword.focus();
            return false;
        }


        if(document.reg.email.value.length==0){
            alert("请输入邮箱!");
            document.reg.email.focus();
            return false;
        }

        if(document.reg.code.value.length==0){
            alert("请输入邀请码!");
            document.code.email.focus();
            return false;
        }


        //var temp = document.getElementById("text1");
        //var email = document.getElementById("email");

        //对电子邮件的验证
        //定义email正则表达式
        var email_reg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;

        if(!email_reg.test(document.reg.email.value)) {
            alert('提示\n\n请输入有效的E-mail！');
            document.reg.email.focus();
            return false;
        }

        // 特殊字符检验
        var no_allow_txt = new RegExp("[\\*,\\&,\\\\,\\/,\\?,\\|,\\:,\\<,\\>,\"]");
        if(no_allow_txt.test(document.reg.username.value)){
            alert("用户名不允许含特殊字符");
            document.reg.username.focus();
            return false;
        }
    }

</script>
</body>
</html>