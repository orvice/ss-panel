<{include file='user/main.tpl'}>
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                信息更新
                <small>Profile Update</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">网站登录密码修改</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->

                            <div class="box-body">

                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="当前密码(必填)" id="nowpwd">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="新密码" id="pwd">
                                </div>

                                <div class="form-group">
                                    <input type="password" placeholder="确认密码" class="form-control" id="repwd">
                                </div>

                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" id="pwd-update" class="btn btn-primary">修改</button>
                            </div>

                            <div id="msg-error" class="alert alert-warning alert-dismissable" style="display:none">
                                <button type="button" class="close" id="msg-error-close" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-warning"></i> 出错了!</h4>
                                <p id="msg-error-p"></p>
                            </div>

                            <div id="msg-success" class="alert alert-info alert-dismissable" style="display:none">
                                <button type="button" class="close" id="msg-success-close" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-info"></i> Ok!</h4>
                                <p id="msg-success-p"></p>
                            </div>

                    </div><!-- /.box -->
                </div>

                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <i class="fa fa-align-left"></i>
                            <h3 class="box-title">Shadowsocks连接密码修改</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">

                                <div class="form-group">
                                    <input type="text" id="sspwd" placeholder="输入新密码" class="form-control"  >
                                </div>

                                <div class="box-footer">
                                    <button type="submit" id="ss-pwd-update" class="btn btn-primary"  >修改 </button>
                                </div>

                                <div id="ss-msg-success" class="alert alert-info alert-dismissable" style="display:none" >
                                    <button type="button" class="close" id="ss-msg-success-close" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-info"></i> 修改成功!</h4>
                                    <p id="ss-msg-success-p"></p>
                                </div>

                                <div id="ss-msg-error" class="alert alert-warning alert-dismissable" style="display:none">
                                    <button type="button" class="close" id="ss-msg-error-close" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-warning"></i> 出错了!</h4>
                                    <p id="ss-msg-error-p"></p>
                                </div>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (right) -->

            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<{include file='Public_javascript.tpl'}>
<!-- 在下面添加功能引用的js -->

<!-- AES -->
<script type="text/javascript" src="<{$public}>/js_aes/aes.js?<{$version}><{date('Ym')}>"></script>
<script type="text/javascript" src="<{$public}>/js_aes/aes-ctr.js?<{$version}><{date('Ym')}>"></script>
<{include file='user/footer.tpl'}>
<script>
    // 过滤HTML标签以及&nbsp 来自：http://www.cnblogs.com/liszt/archive/2011/08/16/2140007.html
    function removeHTMLTag(str) {
            str = str.replace(/<\/?[^>]*>/g,''); //去除HTML tag
            str = str.replace(/[ | ]*\n/g,'\n'); //去除行尾空白
            str = str.replace(/\n[\s| | ]*\r/g,'\n'); //去除多余空行
            str = str.replace(/&nbsp;/ig,'');//去掉&nbsp;
            return str;
    }
</script>

<script>
    $(document).ready(function(){
        $("#msg-error").click(function(){
           $(id_name).focus();
        });
        $("#pwd-update").click(function(){
            function msg_out(msgout,msgcss){
                $("#msg-"+msgcss).hide(10);
                $("#msg-"+msgcss).show(100);
                $("#msg-"+msgcss+"-p").html(msgout);
                $(id_name).focus();
            }
            if($("#nowpwd").val().length==0){
                id_name="#nowpwd";
                msg_out("请输入密码","error");
                msg_id=1;
                return false;
            }
            if($("#pwd").val().length==0){
                id_name="#pwd";
                msg_out("请输入新密码","error");
                msg_id=1;
                return false;
            }
            if($("#repwd").val().length==0){
                id_name="#repwd";
                msg_out("请输入确认密码","error");
                msg_id=1;
                return false;
            }
            if($("#repwd").val()!=$("#pwd").val()){
                id_name="#repwd";
                msg_out("新密码与确认密码不一样，请重新输入。","error");
                msg_id=1;
                return false;
            }
            $.ajax({
                type:"POST",
                url:"_pwd_update.php",
                dataType:"json",
                data:{
                    nowpwd: Aes.Ctr.encrypt($("#nowpwd").val(), "<{$randomChar}>", 256),
                    pwd: Aes.Ctr.encrypt($("#pwd").val(), "<{$randomChar}>", 256),
                    repwd: Aes.Ctr.encrypt($("#repwd").val(), "<{$randomChar}>", 256)
                },
                success:function(data){
                    if(data.ok){
                        $("#msg-error").hide(10);
                        $("#msg-success").show(100);
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='login.php'", 2000);
                    }else{
                        $("#msg-error").show(100);
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                        $("#msg-error-p").html("发生错误："+jqXHR.status);
                        $("#msg-error").hide(50);
                        $("#msg-error").show(100);
                        // 在控制台输出错误信息
                        console.log(removeHTMLTag(jqXHR.responseText));
                }
            })
        }

        )
    })
    $("#msg-success-close").click(function(){
            $("#msg-success").hide(100);
    })
    $("#msg-error-close").click(function(){
        $("#msg-error").hide(100);
    })
</script>

<script>
    $(document).ready(function(){
        $("#ss-pwd-update").click(function(){
            $.ajax({
                type:"POST",
                url:"_sspwd_update.php",
                dataType:"json",
                data:{
                    sspwd: Aes.Ctr.encrypt($("#sspwd").val(), "<{$randomChar}>", 256)
                },
                success:function(data){
                    if(data.ok){
                        $("#ss-msg-success").show(100);
                        $("#ss-msg-success-p").html(data.msg);
                    }else{
                        $("#ss-msg-error").show(100);
                        $("#ss-msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                        $("#ss-msg-error-p").html("发生错误："+jqXHR.status);
                        $("#ss-msg-error").hide(10);
                        $("#ss-msg-error").show(100);
                        // 在控制台输出错误信息
                        console.log(removeHTMLTag(jqXHR.responseText));
                }
            })
        })
    })
    $("#ss-msg-success-close").click(function(){
            $("#ss-msg-success").hide(100);
    })
    $("#ss-msg-error-close").click(function(){
        $("#ss-msg-error").hide(100);
    })
</script>
