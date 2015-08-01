<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <title>注册 - <{$site_name}></title>
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
        <link rel="icon" href="favicon.png?<{$version}><{date('Ym')}>">
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
                        <p class="flow-text"><b>注册</b>，然后变成一只<b>猫</b>。</p>
                    </div>
           </div>

            <div class="col center">
                <div class="prihlasovaci-formular z-depth-3">

                    <form action="javascript:void(0);" autocomplete="off" method="POST">
                     <div class="input-field">
                        <i class="mdi-social-person prefix"></i>
                        <input id="name" type="text" name="name" class="validate" maxlength="16" required>
                        <label for="name">用户名 UserName</label>
                      </div>
                      <div class="input-field">
                        <i class="mdi-content-mail prefix"></i>
                        <input id="email" type="email" name="email" class="validate" maxlength="30" required>
                        <label for="email">邮箱 Email</label>
                      </div>
                      <div class="input-field">
                        <i class="mdi-action-lock prefix"></i>
                        <input id="password" type="password" name="password" class="validate" maxlength="18" required>
                        <label for="password">密码 PassWord</label>
                      </div>
                      <div class="input-field">
                        <i class="mdi-action-lock prefix"></i>
                        <input id="repassword" type="password" name="repassword" class="validate" maxlength="18" required>
                        <label for="repassword">重复密码 RePassWord</label>
                      </div>
                      <div class="input-field">
                        <i class="mdi-content-send prefix"></i>
                        <input id="code" type="text" name="code" class="validate" maxlength="50" required>
                        <label for="code">邀请码 Code</label>
                      </div>
                        <p class="tos modal-trigger waves-effect" >
                            <input type="checkbox" class="filled-in" id="agree"/>
                            <label for="agree">同意<a href="#!" onclick="$('#TOSINFO').openModal();" >《用户协议》</a></label>
                        </p>
                        <div class="center-btn">
                            <p>
                                <button type="submit" class="waves-effect waves-light btn" id="registrace"><i class="mdi-action-done left"></i>&nbsp;&nbsp;注&nbsp;&nbsp;册&nbsp;&nbsp;</button>
                                <a class="waves-effect waves-light btn" id="login"  href="login.php"><i class="mdi-hardware-keyboard-arrow-left left"></i>&nbsp;&nbsp;登&nbsp;&nbsp;录&nbsp;&nbsp;</a>
                                <a class="waves-effect waves-light btn"  href="resetpwd.php"><i class="mdi-action-lock prefix"></i>&nbsp;&nbsp;忘记密码&nbsp;&nbsp;</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="TOSINFO" class="modal modal-fixed-footer" style="z-index: 1003;  opacity: 1; transform: scaleX(1); top: 10%;">
            <div class="modal-content">
               <div class="col 0 s12">
                 <h4>用户协议<small>Terms of Service</small></h4>
                      <p style="font-size: x-large;">
                      <{include file='user/tos-content.tpl'}>
                      </p>
                </div>
            </div>
            <div class="modal-footer">
              <a href="#!" onclick="$('#TOSINFO').closeModal();" class="modal-action modal-close waves-effect waves-green btn waves-light light-blue lighten-1 closetos">关闭</a>
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
                    function register(){
                        $.ajax({
                            type:"POST",
                            url:"_reg.php",
                            dataType:"json",
                            data:{
                                email: $("#email").val(),
                                name: $("#name").val(),
                                passwd: $("#password").val(),
                                repasswd: $("#repassword").val(),
                                code: $("#code").val(),
                                agree: $("#agree").val(),
                            },
                            success:function(data){
                                if(data.ok){
                                    Materialize.toast(data.msg, 3000, 'rounded');
                                    $("#msg-error").closeModal();
                                    $("#msg-success").openModal();
                                    $("#msg-success-p").html(data.msg);
                                    window.setTimeout("location.href='login.php'", 2000);
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

                        incode=$("#code").val();
                    }
                    function registercheck(){
                        var msg_id=0;
                        if($("#name").val().length==0){
                            id_name="#name";
                            msg_out("请输入用户名","error");
                            msg_id=1;
                            return false;
                        }
                        if(($("#name").val()).length<7){
                            id_name="#name";
                            msg_out("用户名太短，长度为7个字符。","error");
                            msg_id=1;
                            return false;
                        }
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
                        if(($("#password").val()).length<8){
                            id_name="#password";
                            msg_out("密码太短，长度为8位以上。","error");
                            msg_id=1;
                            return false;
                        }
                        if($("#repassword").val().length==0){
                            id_name="#repassword";
                            msg_out("请输入重复密码","error");
                            msg_id=1;
                            return false;
                        }
                        if($("#password").val() != $("#repassword").val()){
                            id_name="#repassword";
                            msg_out("两次密码不一样，请重新输入！","error");
                            msg_id=1;
                            return false;
                        }
                        if($("#code").val().length==0){
                            id_name="#code";
                            msg_out("请输入邀请码","error");
                            msg_id=1;
                            return false;
                        }
                        if(document.getElementById("TOS").checked===false){
                            id_name=".tos";
                            msg_out("必须要同意<a href=\"#!\" onclick=\"$('#TOSINFO').openModal();\" >《用户协议》</a>才可以注册!","error");
                            msg_id=1;
                            return false;
                        }''
                        if($("#msg-success-p").eq(0)[0].innerHTML=="注册成功"){
                            msg_out("注册成功","success");
                            msg_id=1;
                            $("#msg-error-p").html(null);
                        }
                        if($("#msg-error-p").eq(0)[0].innerHTML=="邀请码无效"
                                || $("#msg-error-p").eq(0)[0].innerHTML=="邀请码无效，请重新输入！"){
                            if($("#code").val()==incode){
                                id_name="#code";
                                msg_out("邀请码无效，请重新输入！","error");
                                msg_id=1;
                                return false;
                            }
                        }
                        if(msg_id==0){
                            register();
                        }
                    }
                    function msg_out(msgout,msgcss){
                        $('.lean-overlay').remove();
                        Materialize.toast(msgout, 3000, 'rounded');
                        $(id_name).focus();
                        // $("#msg-"+msgcss).openModal();
                        $("#msg-"+msgcss+"-p").html(msgout);
                    }
                    $("html").keydown(function(event){
                        if(event.keyCode==13){
                            registercheck();
                            return false;
                        }
                        if(event.keyCode==27){
                            error_close();
                        }
                    });
                    $("#registrace").click(function(){
                        registercheck();
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