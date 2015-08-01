<{extends file="header.tpl"}><{block name="title" prepend}>邀请 - <{/block}><{block name="contents"}>
<div class="had-container">
   <{include file='admin/nav.tpl'}>

<div class="section no-pad-bot" id="index-banner">
    <div class="container ">
      <h5 class="white-text">
          邀请
          <small>Invite</small>
      </h5>

        <div class="section">
          <div class="row card-panel color-panel light-blue lighten-5 z-depth-2 hoverable">
            <div class="col s12">
              <div class="card-panel darken-1 hoverable">
                      <span class="white-text">
                      <h5 class="header black-text">添加邀请码</h5>
                      <div class="black-text">
                          <form role="form" method="post" action="invite_add_do.php">
                              <div class="input-field">
                                <input id="code_sub" type="text" name="code_sub" class="validate">
                                <label for="code_sub">邀请码前缀 小于8个字符</label>
                              </div>
                              <div class="input-field">
                                <input id="code_type" type="text" name="code_type" class="validate">
                                <label for="code_type">邀请码类别 0为公开，其他数字为对应用户的UID</label>
                              </div>
                              <div class="input-field">
                                <input id="code_num" type="text" name="code_num" class="validate">
                                <label for="code_num">邀请码数量 要生成的邀请码数量</label>
                              </div>
                                  <button id="pwd-update" type="submit" class="btn waves-effect waves-light light-blue lighten-1">添加</button>
                              <div class="box-footer">
                                <p>邀请码类别0的<a href="../code.php">在这里查看</a> </p>
                              </div>
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
<script type="text/javascript" src="<{$resources_dir}>/asset/js/Prompt_message.js?<{$version}><{date('Ym')}>"></script>
<script type="text/javascript">
  _Prompt_ss_msg();
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