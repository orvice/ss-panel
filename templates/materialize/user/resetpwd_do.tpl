<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <title>重置密码 - <{$site_name}></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, user-scalable=no">
        <meta name="robots" content="noindex,nofollow">
        <link rel="icon" href="favicon.png?<{date('Ymd_h')}>">
        <meta name="theme-color" content="#4CAEEA">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="apple-mobile-web-app-title" content="DiskForYou">
        <meta name="msapplication-TileColor" content="#4CAEEA">
        <meta name="application-name" content="DiskForYou">
        <link rel="stylesheet" href="<{$resources_dir}>/asset/css/LoadingBar.css?<{date('Ymd_h')}>" />
        <script>
          paceOptions = {
            elements: true
          };
        </script>
        <script src="<{$resources_dir}>/asset/js/pace.min.js?<{date('Ymd_h')}>"></script>
        <link href="<{$resources_dir}>/asset/css/materialize.css?<{date('Ymd_h')}>" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<{$resources_dir}>/asset/css/style.css?<{date('Ymd_h')}>" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<{$resources_dir}>/asset/css/main.css?<{date('Ymd_h')}>" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<{$resources_dir}>/asset/css/Material_Icons.css?<{date('Ymd_h')}>" rel="stylesheet">
        <style>
          html { 
                  background-color: #00A8FF;
                  background: linear-gradient(to bottom,rgba(39, 165, 255, 0.97) 0%,rgba(98, 198, 221, 0.96) 100%);
                  position: absolute;
                  width: 100%;
                  height: 100%; 
                }
        </style>
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
                        <p class="flow-text"><b>重置密码</b></p>
                    </div>
           </div>
            <div class="col center">
                <div class="prihlasovaci-formular z-depth-3">

                    <form  action="javascript:void(0);" autocomplete="off" method="POST">
                      <div class="input-field">
                        <input type="hidden" id="code" name="code" class="form-control" value="<{$code|default:""}>" >
                        <input type="hidden" id="uid" name="uid" class="form-control" value="<{$uid|default:""}>" >
                        <i class="mdi-content-mail prefix"></i>
                        <input id="email" type="email" name="email" class="validate" maxlength="30" required>
                        <label for="email">邮箱 Email</label>
                      </div>
                        <div class="center-btn">
                            <p>
                                <button type="submit" id="reset" class="waves-effect waves-light btn"><i class="mdi-action-done left"></i>&nbsp;&nbsp;重&nbsp;&nbsp;置&nbsp;&nbsp;</button>
                                <a class="waves-effect waves-light btn" id="login" href="login.php"><i class="mdi-hardware-keyboard-arrow-left left"></i>&nbsp;&nbsp;登&nbsp;&nbsp;录&nbsp;&nbsp;</a>
                                <a class="waves-effect waves-light btn" id="registrace"  href="register.php"><i class="mdi-social-person-add left"></i>&nbsp;&nbsp;注&nbsp;&nbsp;册&nbsp;&nbsp;</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       <div id="msg-success" class="modal" style="z-index: 1003; opacity: 1; transform: scaleX(1); top: 5%;"title="点击关闭" >
            <div class="modal-content" id="ok-close">
                <h4><i class="mdi-image-tag-faces" style="font-size: 1em;"></i>成功了!</h4>
                <p id="msg-success-p" style=" COLOR: deepskyblue; FONT-SIZE: x-large;"></p>
            </div>
            <div class="modal-footer">
                 <a href="#!" onclick="$('#msg-success').closeModal();" class="modal-action modal-close btn waves-light light-blue lighten-1 modal-action modal-close waves-effect waves-red">关闭</a>
            </div>
        </div>
        
         <div id="msg-error" class="modal" style="z-index: 1003; opacity: 1; transform: scaleX(1); top: 5%;"title="点击关闭" >
              <div class="modal-content" id="error-close">
                    <h4><i class="mdi-alert-error" style="font-size: 1em;"></i>出错了!</h4>
                    <p id="msg-error-p" style=" COLOR: RED; FONT-SIZE: x-large;"> </p>
              </div>
          <div class="modal-footer">
             <a href="#" onclick="$('#msg-success').closeModal();" class="modal-action modal-close btn waves-light light-blue lighten-1 modal-action modal-close waves-effect waves-red">关闭</a>
          </div>
        </div>

                <script type="text/javascript" src="<{$resources_dir}>/asset/js/jquery-2.1.1.min.js?<{date('Ymd_h')}>s"></script>
                <script type="text/javascript" src="<{$resources_dir}>/asset/js/materialize.min.js?<{date('Ymd_h')}>"></script>
<script>
    $(document).ready(function(){
          function reset(){
               $.ajax({
                type:"GET",
                url:"_resetpwdtwo.php?code="+$("#code").val()+"&uid="+$("#uid").val()+"&email="+$("#email").val(),
                dataType:"json",
                success:function(data){
                    if(data.ok){
                        Materialize.toast(data.msg, 3000, 'rounded')
                        $("#msg-error").closeModal();
                        $("#msg-success").openModal();
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='index.php'", 2000);
                    }else{
                        Materialize.toast(data.msg, 3000, 'rounded')
                        $("#msg-success").closeModal();
                        $("#msg-error").openModal();
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    Materialize.toast("发生错误："+jqXHR.status, 3000, 'rounded')
                    $("#msg-error").openModal();
                    $("#msg-error-p").html("发生错误："+jqXHR.status);
                }
            });
            
            inpemail=$("#email").val();
        }
        function resetcheck(){
                    var msg_id=0;
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
                    if($("#msg-success-p").eq(0)[0].innerHTML=="已经发送到邮箱"){
                            msg_out("已经发送到邮箱","success");
                            msg_id=1;
                            $("#msg-error-p").html(null);
                     }
                    if($("#msg-error-p").eq(0)[0].innerHTML=="邮箱不存在" 
                    || $("#msg-error-p").eq(0)[0].innerHTML=="邮箱不存在，请重新输入！"){
                         if($("#email").val()==inpemail){
                            id_name="#email";
                            msg_out("邮箱不存在，请重新输入！","error");
                            msg_id=1;
                            return false;
                            }
                    }
                    if(msg_id==0){ 
                            reset();
                    }
        }
        function msg_out(msgout,msgcss){            
                    $('.lean-overlay').remove();
                    Materialize.toast(msgout, 3000, 'rounded')
                    $(id_name).focus();
                    // $("#msg-"+msgcss).openModal();
                    $("#msg-"+msgcss+"-p").html(msgout);
        }
        $("html").keydown(function(event){
            if(event.keyCode==13){
                resetcheck();
                return false;
            }
            if(event.keyCode==27){
                error_close();
            }
        });
        $("#reset").click(function(){
            resetcheck();
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