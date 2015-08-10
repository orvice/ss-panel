<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <title>登录 - <{$site_name}></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="<{$resources_dir}>/asset/css/LoadingBar.css?<{$version}><{date('Ym')}>" />
        <script>
            paceOptions = {
              elements: true
            };
        </script>
        <script src="<{$resources_dir}>/asset/js/pace.min.js?<{$version}><{date('Ym')}>"></script>
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, user-scalable=no">
        <meta name="robots" content="noindex,nofollow">
        <!-- Favicon -->
        <link rel="icon" href="<{$site_url}>favicon.ico?<{$version}><{date('Ym')}>">
        <meta name="theme-color" content="#4CAEEA">
        <meta name="mobile-web-app-capable" content="yes">
        <!-- <link rel="icon" sizes="192x192" href="chrome-touch-icon-192x192.png"> -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="apple-mobile-web-app-title" content="<{$site_name}>">
        <!-- <link rel="apple-touch-icon" href="apple-touch-icon.png"> -->
        <!-- <meta name="msapplication-TileImage" content="favicon-win.png"> -->
        <meta name="msapplication-TileColor" content="#4CAEEA">
        <meta name="application-name" content="<{$site_name}>">
        <link href="<{$resources_dir}>/asset/css/materialize.min.css?<{$version}><{date('Ym')}>" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<{$resources_dir}>/asset/css/Material_Icons.css?<{$version}><{date('Ym')}>" rel="stylesheet">
        <link href="<{$resources_dir}>/asset/css/main.css?<{$version}><{date('Ym')}>" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <div class="row hlavnistrankaprihlaseni">
            <div class="row">
                <div class="col l6">
                    <h1><a href="<{$site_url}>" style="color:aliceblue"><{$site_name}></a></h1>
                </div>
            </div>
            <div class="row">
                    <div class="col l5">
                        <p class="flow-text"><b>登录到用户中心</b></p>
                    </div>
           </div>

            <div class="col center">
                <div class="prihlasovaci-formular z-depth-3">

                    <form action="javascript:void(0);" autocomplete="off" method="POST">
                      <div class="input-field">
                        <i class="mdi-content-mail prefix"></i>
                        <input id="email" type="email" name="email" class="validate" maxlength="30" required>
                        <label for="email">邮箱 Email</label>
                      </div>
                      <div class="input-field">
                        <i class="mdi-action-lock prefix"></i>
                        <input id="password" type="password" name="password" class="validate" required>
                        <label for="password">密码 PassWord</label>
                      </div>
                        <p class="modal-trigger waves-effect">
                          <input type="checkbox" id="remember_me"/>
                          <label for="remember_me">记住我</label>
                        </p>
                      
                        <div class="center-btn">
                            <p>
                                <button type="submit" class="waves-effect waves-light btn" id="login"><i class="mdi-action-done left"></i>&nbsp;&nbsp;登&nbsp;&nbsp;录&nbsp;&nbsp;</button>
                                <{block name="no-content"}>
                                <a class="waves-effect waves-light btn" id="registrace"  href="register.php"><i class="mdi-social-person-add left"></i>&nbsp;&nbsp;注&nbsp;&nbsp;册&nbsp;&nbsp;</a>
                                <a class="waves-effect waves-light btn"  href="resetpwd.php"><i class="mdi-action-lock prefix"></i>&nbsp;&nbsp;忘记密码&nbsp;&nbsp;</a>
                                <{/block}>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<{$resources_dir}>/asset/js/jquery-2.1.1.min.js?<{$version}><{date('Ym')}>"></script>
        <script type="text/javascript" src="<{$resources_dir}>/asset/js/materialize.min.js?<{$version}><{date('Ym')}>"></script>
        <script type="text/javascript" src="<{$resources_dir}>/asset/js/Prompt_message.js?<{$version}><{date('Ym')}>"></script>
        <script type="text/javascript">
            _Prompt_msg();
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                function login(){
                    $.ajax({
                        type:"POST",
                        url:"_login.php",
                        dataType:"json",
                        data:{
                            email: $("#email").val(),
                            passwd: $("#password").val(),
                            remember_me: $("#remember_me").val()
                        },
                        success:function(data){
                            if(data.ok){
                                Materialize.toast(data.msg, 3000, 'rounded');
                                $("#msg-error").closeModal();
                                $("#msg-success").openModal();
                                $("#msg-success-p").html(data.msg);
                                window.setTimeout("location.href='index.php'", 2000);
                            }else{
                                Materialize.toast(data.msg, 3000, 'rounded');
                                $("#msg-success").closeModal();
                                $("#msg-error").openModal();
                                $("#msg-error-p").html(data.msg);
                            }

                        },
                        error:function(jqXHR){
                            Materialize.toast("发生错误："+jqXHR.status, 3000, 'rounded');
                            $("#msg-error").openModal();
                            $("#msg-error-p").html("发生错误："+jqXHR.status);
                        }
                    });

                    inemail=$("#email").val();
                    inpasswd=$("#password").val();
                }
                function logincheck()
                {
                    var msg_id=0,msgcss="error";
                    if($("#email").val().length==0){
                        id_name="#email";
                        msg_out("请输入邮箱","error");
                        msg_id=1;
                        return false;
                    }
                    var email_reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
                    if(!email_reg.test($("#email").val())) {
                        id_name="#email";
                        msg_out("请输入有效的邮箱！","error");
                        msg_id=1;
                        return false;
                    }
                    if($("#password").val().length==0){
                        id_name="#password";
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
                        if($("#password").val()==inpasswd && $("#email").val()==inemail){
                            id_name="#password";
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
                    $('.lean-overlay').remove();
                    Materialize.toast(msgout, 3000, 'rounded')
                    $(id_name).focus();
                    // $("#msg-"+msgcss).openModal(10);
                    $("#msg-"+msgcss+"-p").html(msgout);
                }

                $("html").keydown(function(event){
                    if(event.keyCode==13){
                        logincheck();
                        return false;
                    }
                    if(event.keyCode==27){
                        error_close();
                    }
                });
                $("#login").click(function(){
                    logincheck();
                });
                $("#ok-close").click(function(){
                    $("#msg-success").closeModal();
                });
                $("#msg-error").click(function(){
                    error_close();
                });

                function error_close(){
                    if($("#msg-error").css('display')=="block"){
                        $("#msg-error").closeModal();
                        $(id_name).focus();
                        if(id_name=="#email"){
                            $(id_name).select();
                        }
                    }
                }
            })
        </script>
    </body>
</html>