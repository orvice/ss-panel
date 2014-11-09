<?php
include_once 'lib/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>登录</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">


</head>
<body>
<div class="container">
    <div class="row">

        <div class="main">

            <h3>请登录或 <a href="reg.php">注册</a></h3>

            <div class="login-or">
                <hr class="hr-or">
                <span class="span-or">登录</span>
            </div>

            <form role="form" name="login" method="post" action="dologin.php" onsubmit="return logincheck()">
                <div class="form-group">
                    <label for="inputUsernameEmail">用户名</label>
                    <input type="text" name="username" class="form-control" id="inputUsernameEmail">
                </div>
                <div class="form-group">
                    <a class="pull-right" href="#">忘记密码?</a>
                    <label for="inputPassword">密码</label>
                    <input type="password" name="password" class="form-control" id="inputPassword">
                </div>
                <div class="checkbox pull-right">
                    <label>
                        <input type="checkbox">
                        记住我 </label>
                </div>
                <button type="submit" class="btn btn btn-primary">
                    登录
                </button>
            </form>

        </div>

    </div>
</div>

<script LANGUAGE="javascript">

    function logincheck()
    {
        if(document.login.username.value.length==0){
            alert("请输入用户名");
            document.login.username.focus();
            return false;
        }

        if(document.login.password.value.length==0){
            alert("请输入密码!");
            document.login.password.focus();
            return false;
        }


    }

</script>
<?php include_once 'ana.php'?>
</body>
</html>