{include file='auth/header.tpl'}
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>{$config['appName']}</b></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">重置密码</p>

        <form>
            <div class="form-group has-feedback">
                <input type="password" id="password" class="form-control" placeholder="在这里输入新密码"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>


        </form>
        <div class="row">

            <div class="col-xs-4">
                <button id="reset" type="submit" class="btn btn-primary btn-block btn-flat">重置密码</button>
            </div><!-- /.col -->
        </div>
        <div id="msg-success" class="alert alert-info alert-dismissable" style="display: none;">
            <button type="button" class="close" id="ok-close" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info"></i> 成功!</h4>
            <p id="msg-success-p"></p>
        </div>
        <div id="msg-error" class="alert alert-warning alert-dismissable" style="display: none;">
            <button type="button" class="close" id="error-close" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> 出错了!</h4>
            <p id="msg-error-p"></p>
        </div>
        <a href="/auth/login">登陆</a><br>
        <a href="/auth/register" class="text-center">注册个帐号</a>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.3 -->
<script src="/assets/public/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="/assets/public/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="/assets/public/js/icheck.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
    // $("#msg-error").hide(100);
    // $("#msg-success").hide(100);
</script>
<script>
    $(document).ready(function(){
        function reset(){
            $.ajax({
                type:"POST",
                url:"/password/token/{$token}",
                dataType:"json",
                data:{
                    password: $("#password").val(),
                    repasswd: $("#repasswd").val(),
                },
                success:function(data){
                    if(data.ret){
                        $("#msg-error").hide(100);
                        $("#msg-success").show(100);
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='/auth/login'", 2000);
                    }else{
                        $("#msg-error").hide(10);
                        $("#msg-error").show(100);
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    $("#msg-error").hide(10);
                    $("#msg-error").show(100);
                    $("#msg-error-p").html("发生错误："+jqXHR.status);
                    // 在控制台输出错误信息
                    console.log(removeHTMLTag(jqXHR.responseText));
                }
            });
        }
        $("html").keydown(function(event){
            if(event.keyCode==13){
                reset();
            }
        });
        $("#reset").click(function(){
            reset();
        });
        $("#ok-close").click(function(){
            $("#msg-success").hide(100);
        });
        $("#error-close").click(function(){
            $("#msg-error").hide(100);
        });
    })
</script>
</body>
</html>
