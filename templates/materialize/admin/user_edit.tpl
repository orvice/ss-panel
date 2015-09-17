<{extends file="header.tpl"}><{block name="title" prepend}>用户管理 - <{/block}><{block name="contents"}>
<div class="had-container">
   <{include file='admin/nav.tpl'}>

<div class="section no-pad-bot" id="index-banner">
    <div class="container ">
      <h5 class="white-text">
          用户管理
          <small>User Manage</small>
      </h5>

        <div class="section">
          <div class="row card-panel color-panel light-blue lighten-5 z-depth-2 hoverable">
            <div class="col s12">
              <div class="card-panel darken-1 hoverable">
                      <span class="white-text">
                      <h5 class="header black-text">编辑用户</h5>
                      <div class="black-text">
                          <form role="form" method="post" action="javascript:void(0);">
                              ID: <{$uid}>
                              <div class="input-field">
                                <input type="text" name="user_name" id="user_name" value="<{$rs['user_name']}>" class="validate">
                                <label for="user_name">用户名</label>
                              </div>
                              <div class="input-field">
                                <input type="text" name="user_email" id="user_email" value="<{$rs['email']}>" class="validate">
                                <label for="user_email">用户邮箱</label>
                              </div>
                              <div class="input-field">
                                <input type="text" name="user_pass" id="user_pass" class="validate">
                                <label for="user_pass">用户密码 新密码(不修改请留空)</label>
                              </div>
                              <div class="input-field">
                                <input type="text" name="user_passwd" id="user_passwd" value="<{$rs['passwd']}>" class="validate">
                                <label for="user_passwd">连接密码</label>
                              </div>
                              <div class="input-field">
                                <input type="text" name="transfer_enable" id="transfer_enable" value="<{\Ss\Etc\Comm::flowAutoShow($rs['transfer_enable'])}>" class="validate">
                                <label for="transfer_enable">设置流量 单位为GB</label>
                              </div>
                              <div class="input-field">
                                <input type="text" name="invite_num" id="invite_num" value="<{$rs['invite_num']}>" class="validate">
                                <label for="invite_num">邀请码数量</label>
                              </div>
                              <div class="switch">状态：<br/>
                                <label>
                                  停止
                                  <input type="checkbox"  id="enable" <{if $rs['enable']==1}> value="checkbox" checked="checked" <{/if}>  >
                                  <span class="lever"></span>
                                  正常          
                                </label>
                              </div><br/>
                              <button id="Submit" type="submit" class="btn waves-effect waves-light light-blue lighten-1">修改</button>
                          </form>
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

<!-- AES -->
<script type="text/javascript" src="<{$public}>/js_aes/aes.js?<{$version}><{date('Ym')}>"></script>
<script type="text/javascript" src="<{$public}>/js_aes/aes-ctr.js?<{$version}><{date('Ym')}>"></script>
<script type="text/javascript" src="<{$resources_dir}>/asset/js/Prompt_message.js?<{$version}><{date('Ym')}>"></script>
<script type="text/javascript">
  _Prompt_msg();
  // 过滤HTML标签以及&nbsp 来自：http://www.cnblogs.com/liszt/archive/2011/08/16/2140007.html
  function removeHTMLTag(str) {
      str = str.replace(/<\/?[^>]*>/g,''); //去除HTML tag
      str = str.replace(/[ | ]*\n/g,'\n'); //去除行尾空白
      str = str.replace(/\n[\s| | ]*\r/g,'\n'); //去除多余空行
      str = str.replace(/&nbsp;/ig,'');//去掉&nbsp;
      return str;
  }
</script>
<script type="text/javascript">
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
                        $("#msg-error").closeModal();
                        $("#msg-success").openModal();
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='user.php'", 2000);
                    }else{
                        $("#msg-error").openModal();
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                        $("#msg-error-p").html("发生错误："+jqXHR.status);
                        $("#msg-error").openModal();
                        // 在控制台输出错误信息
                        console.log(removeHTMLTag(jqXHR.responseText));
                }
            })
        })
        $("#ok-close").click(function(){
            $("#msg-success").closeModal();
        })
        $("#error-close").click(function(){
            $("#msg-error").closeModal();
        })
    })
</script><{/block}> <{* 以上继承内容到父模板 Public_javascript.tpl 中的 javascript *}>
