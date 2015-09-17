<{include file='admin/main.tpl'}>

<!-- =============================================== -->

<style type="text/css">
.new_chk {
    display: none;
}
.new_chk + label {
	background-color: #FFF;
	padding: 11px 9px;
	border-radius: 7px;
	display: inline-block;
	position: relative;
	margin-right: 30px;
	background: #F7836D;
	width: 58px;
	height: 10px;
	box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.1), 0 0 10px rgba(245, 146, 146, 0.4);
	width: 76px;
    height: 32px;
    top: 16px;
}
.new_chk + label:before {
	content: ' ';
	position: absolute;
	background: #FFF;
	top: 0px;
	z-index: 99999;
	left: 0px;
	width: 24px;
	color: #FFF;
	height: 32px;
	border-radius: 7px;
	box-shadow: 0 0 1px rgba(0,0,0,0.6);
}
.new_chk + label:after {
	content: '停止';	
	position: absolute;
	font-size: 1.2em;
	color: white;
	font-weight: bold;
	left: 8px;
	padding: 1px;
	top: 4px;
	border-radius: 100px;
}
.new_chk:checked + label {
	background: #67A5DF;
	box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.1), 0 0 10px rgba(146, 196, 245, 0.4);
}
.new_chk:checked + label:after {
	content: '正常';
	left: 5px;
}
.new_chk:checked + label:before {
	content: '';
	position: absolute;
	z-index: 99999;
	left: 52px;
}
.new_chk + label:after {
	left: 30px;	
}	
#enable + label:after, #enable + label:before, #checkbox label {	
	-webkit-transition: all 0.1s ease-in;
	transition: all 0.1s ease-in;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
        <h1>
            用户管理
            <small>User Manage</small>
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
                        <h3 class="box-title">编辑用户</h3>
                    </div><!-- /.box-header -->
                        <div class="box-body">

                            <div class="form-group">
                                <label for="cate_title">ID: <{$uid}></label>
                            </div>

                            <div class="form-group">
                                <label for="cate_title">用户名</label>
                                <input  class="form-control" id="user_name" value="<{$rs['user_name']}>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">用户邮箱</label>
                                <input  class="form-control" id="user_email" value="<{$rs['email']}>"  >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">用户密码</label>
                                <input  class="form-control" id="user_pass" placeholder="新密码(不修改请留空)" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">连接密码</label>
                                <input  class="form-control" id="user_passwd" value="<{$rs['passwd']}>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">设置流量</label>
                                <input   class="form-control" id="transfer_enable" value="<{\Ss\Etc\Comm::flowAutoShow($rs['transfer_enable'])}>" placeholder="单位为GB，直接输入数值" >
                            </div>
                            
                            <div class="form-group">
                                <label for="cate_title">邀请码数量</label>
                                <input  class="form-control" id="invite_num" value="<{$rs['invite_num']}>" 
                            </div>
                            
                            <div class="form-group">
                                <label for="cate_title">状态：</label>
                                <input type="checkbox" id="enable" class="new_chk" <{if $rs['enable']==1}> value="checkbox" checked="checked" <{/if}>  />
			                    <label for="enable"></label>
                            </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="Submit" id="Submit" name="action" value="edit" class="btn btn-primary">修改</button>
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
                </div>
            </div><!-- /.box -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<{include file='Public_javascript.tpl'}>
<!-- 在下面添加功能引用的js -->

<!-- AES -->
<script type="text/javascript" src="<{$public}>/js_aes/aes.js?<{$version}><{date('Ym')}>"></script>
<script type="text/javascript" src="<{$public}>/js_aes/aes-ctr.js?<{$version}><{date('Ym')}>"></script>
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
        $("#Submit").click(function(){
            $.ajax({
                type:"POST",
                url:"_user_edit.php",
                dataType:"json",
                data:{
                    user_uid: "<{$uid}>",
                    user_name: $("#user_name").val(),
                    user_email: $("#user_email").val(),
                    user_email_hidden: "<{$rs['email']}>",
                    user_pass: Aes.Ctr.encrypt($("#user_pass").val(), "<{$randomChar}>", 256),
                    user_pass_hidden: "<{$rs['pass']}>",
                    user_passwd: Aes.Ctr.encrypt($("#user_passwd").val(), "<{$randomChar}>", 256),
                    transfer_enable: $("#transfer_enable").val(),
                    transfer_enable_hidden: "<{\Ss\Etc\Comm::flowAutoShow($rs['transfer_enable'])}>",
                    invite_num: $("#invite_num").val(),
                    enable: document.getElementById("enable").checked ? "1" : "0"
                },
                success:function(data){
                    if(data.ok){
                        $("#msg-error").hide(10);
                        $("#msg-success").show(100);
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='user.php'", 2000);
                    }else{
                        $("#msg-error").show(100);
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                        $("#msg-error-p").html("发生错误："+jqXHR.status);
                        $("#msg-error").hide(10);
                        $("#msg-error").show(100);
                        // 在控制台输出错误信息
                        console.log(removeHTMLTag(jqXHR.responseText));
                }
            })
        })
        $("#ok-close").click(function(){
            $("#msg-success").hide(100);
        })
        $("#error-close").click(function(){
            $("#msg-error").hide(100);
        })
    })
</script>

<{include file='user/footer.tpl'}>
