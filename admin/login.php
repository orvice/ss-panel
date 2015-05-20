<?php
require_once '../lib/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $site_name;  ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../asset/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="../asset/css/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b><?php echo $site_name;  ?></b></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">登录到管理面板</p>

            <form>
            <div class="form-group has-feedback">
                <input id="email" name="Email" type="text" class="form-control" placeholder="邮箱"/>
                <span  class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input id="passwd" name="Password" type="password" class="form-control" placeholder="密码"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            </form>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input id="remember_me" value="week" type="checkbox"> 记住我
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button id="login" type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
                </div><!-- /.col -->
            </div>
                
            <div id="msg-success" class="alert alert-info alert-dismissable"style="border: 1px solid rgb(50, 163, 213); text-align: center; z-index: 999; width: 300px; left: 50%; margin-left: -150px !important; margin-top: -118px !important; position: fixed !important; display: none;">
                <button type="button" class="close" id="ok-close" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info"></i> 登录成功!</h4>
               <p id="msg-success-p"></p>
            </div>
    
            <div id="msg-error" class="alert alert-danger" style="border: 1px solid rgb(255, 0, 0); text-align: center; z-index: 999; width: 300px; left: 50%; margin-left: -150px !important; margin-top: -118px !important; position: fixed !important; display: none;">
                <button type="button" class="close" id="error-close" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> 出错了!</h4>
                <p id="msg-error-p"></p>
            </div>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.3 -->
<script src="../asset/js/jQuery.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="../asset/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="../asset/js/icheck.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
<script>
    $(document).ready(function(){
        function login(){
            $.ajax({
                type:"POST",
                url:"_login.php",
                dataType:"json",
                data:{
                    email: $("#email").val(),
                    passwd: $("#passwd").val(),
                    remember_me: $("#remember_me").val()
                },
                success:function(data){
                    if(data.ok){
                        $("#msg-error").hide(100);
                        $("#msg-success").show(100);
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='index.php'", 2000);
                    }else{
                        $("#msg-error").show(100);
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                     $("#msg-error").hide(10);
                     $("#msg-error").show(100);
                     $("#msg-error-p").html("发生错误："+jqXHR.status);
                }
            });
            
            inemail=$("#email").val();
            inpasswd=$("#passwd").val();
        }
        function logincheck()
            {
                var msg_id=0;
                if($("#email").val().length==0){
                    id_name="#email";
                    msg_out("请输入邮箱","error");
                    msg_id=1;
                    return false;
                }
                var email_reg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
                if(!email_reg.test($("#email").val())) {
                    id_name="#email";
                    msg_out("请输入有效的邮箱！","error");
                    msg_id=1;
                    return false;
                }
                if($("#passwd").val().length==0){
                    id_name="#passwd";
                    msg_out("请输入密码","error");
                    msg_id=1;
                    return false;
                }
                if($("#msg-success-p").eq(0)[0].innerHTML=="欢迎回来"
                    || $("#msg-success-p").eq(0)[0].innerHTML=="你已成功登录！"){
                        msg_out("你已成功登录！","success");
                        msg_id=1;
                        $("#msg-error-p").html(null);
                }
                if($("#msg-error-p").eq(0)[0].innerHTML=="邮箱或者密码错误" 
                    || $("#msg-error-p").eq(0)[0].innerHTML=="邮箱或者密码错误，请重新输入！"){
                     if($("#passwd").val()==inpasswd && $("#email").val()==inemail){
                        id_name="#passwd";
                        msg_out("邮箱或者密码错误，请重新输入！","error");
                        msg_id=1;
                        return false;
                    }
                }
                if(msg_id==0){
                    login();
                }
            }
            function msg_out(msgout,msgcss){
                    $("#msg-"+msgcss).hide(10);
                    $("#msg-"+msgcss).show(100);
                    $("#msg-"+msgcss+"-p").html(msgout);
                    $(id_name).focus();
            }
        $("html").keydown(function(event){
            if(event.keyCode==13){
                logincheck();
            }
        });
        $("#login").click(function(){
            logincheck();
        });
        $("#ok-close").click(function(){
            $("#msg-success").hide(100);
        });
        $("#error-close").click(function(){
            $("#msg-error").hide(100);
            $(id_name).focus();
        });
    })
</script>
</body>
</html>
