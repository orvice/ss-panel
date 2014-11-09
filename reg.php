<?php
include_once 'lib/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>注册</title>
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

            <h3>已有账号？ <a href="login.php">登录</a></h3>

            <div class="login-or">
                <hr class="hr-or">
                <span class="span-or">注册</span>
            </div>

            <form name="reg" role="form" action="doreg.php" method="post" onsubmit="return regcheck()">
                <div class="form-group">
                    <label for="username">用户名</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $_COOKIE['reg_name'];?>"  >
                </div>

                <div class="form-group">
                    <label for="inputPassword">密码</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="form-group">
                    <label for="inputPassword">密码</label>
                    <input type="password" class="form-control" name="repassword">
                </div>


                <div class="form-group">
                    <label for="inputUsernameEmail">邮箱</label>
                    <input type="text" name="email" class="form-control" id="inputUsernameEmail" value="<?php echo $_COOKIE['reg_name'];?>" >
                </div>

                <?php if($invite_only){ ?>
                    <div class="form-group">
                        <label for="inputPassword">邀请码</label>
                        <input type="text" class="form-control" name="code" value="<?php echo $_COOKIE['reg_code'];?>" >
                    </div>
                <?php } ?>

                <button type="submit" class="btn btn btn-primary">
                    提交注册
                </button>
            </form>

        </div>

    </div>
</div>
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
<?php include_once 'ana.php'?>
</body>
</html>