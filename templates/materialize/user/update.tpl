<{extends file="header.tpl"}><{block name="title" prepend}>修改资料 - <{/block}><{block name="contents"}>
<div class="had-container">
   <{include file='user/nav.tpl'}>

<div class="section no-pad-bot" id="index-banner">
    <div class="container ">
      <h5 class="white-text">
          信息更新
          <small>Profile Update</small>
      </h5>

        <div class="section">
          <div class="row card-panel color-panel light-blue lighten-5 z-depth-2 hoverable">
            <div class="col s12 m12 l6">
              <div class="card-panel darken-1 hoverable">
                      <span class="white-text">
                      <h5 class="header black-text">网站登录密码修改</h5>
                      <div class="black-text">
                        <div class="input-field">
                        <i class="mdi-action-lock prefix"></i>
                        <input id="nowpwd" type="password" name="password" class="validate" required>
                        <label for="nowpwd">当前密码(必填)</label>
                      </div>
                      <div class="input-field">
                        <i class="mdi-action-lock prefix"></i>
                        <input id="pwd" type="password" name="password" class="validate" maxlength="18" required>
                        <label for="pwd">新密码</label>
                      </div>
                      <div class="input-field">
                        <i class="mdi-action-lock prefix"></i>
                        <input id="repwd" type="password" name="password" class="validate" maxlength="18" required>
                        <label for="repwd">确认密码</label>
                      </div>
                          <button id="pwd-update" type="submit" class="btn waves-effect waves-light light-blue lighten-1">修改</button>
                      </div>
                 </span> 
                </div>
            </div>

            <div class="col s12 m12 l6">
              <div class="card-panel darken-1 hoverable">
                      <span class="white-text">
                      <h5 class="header black-text">Shadowsocks连接密码修改</h5>
                      <div class="black-text">
                      <div class="input-field">
                        <i class="mdi-action-lock prefix"></i>
                        <input id="sspwd" type="password" name="password" class="validate" maxlength="30" required>
                        <label for="sspwd">输入新密码</label>
                      </div>
                          <button id="ss-pwd-update" type="submit" class="btn waves-effect waves-light light-blue lighten-1">修改</button>   
                      </div>
                 </span> 
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<{include file='footer.tpl'}> <{/block}> <{* 以上继承内容到父模板header.tpl 中的 contents *}>
<{extends file="Public_javascript.tpl" append}> <{block name="javascript"}>
<{* 请在下面加入你的 javascript *}>
<script type="text/javascript" src="<{$resources_dir}>/asset/js/Prompt_message.js?<{$version}><{date('Ym')}>"></script>
<script type="text/javascript">
	_Prompt_ss_msg();
	_Prompt_msg();
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#pwd-update").click(function(){
            $.ajax({
                type:"POST",
                url:"_pwd_update.php",
                dataType:"json",
                data:{
                    nowpwd: $("#nowpwd").val(),
                    pwd: $("#pwd").val(),
                    repwd: $("#repwd").val()
                },
                success:function(data){
                    if(data.ok){
                        $("#msg-error").closeModal();
                        $("#msg-success").openModal();
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='login.php'", 2000);
                    }else{
                        $("#msg-error").openModal();
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    alert("发生错误："+jqXHR.status);
                }
            })
        })
    })
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#ss-pwd-update").click(function(){
            $.ajax({
                type:"POST",
                url:"_sspwd_update.php",
                dataType:"json",
                data:{
                    sspwd: $("#sspwd").val()
                },
                success:function(data){
                    if(data.ok){
                        $("#ss-msg-success").openModal();
                        $("#ss-msg-success-p").html(data.msg);
                    }else{
                        $("#ss-msg-error").openModal();
                        $("#ss-msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    alert("发生错误："+jqXHR.status);
                }
            })
        })
    })
</script><{/block}> <{* 以上继承内容到父模板 Public_javascript.tpl 中的 javascript *}>