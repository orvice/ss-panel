<{extends file="header.tpl"}><{block name="title" prepend}>邀请 - <{/block}><{block name="contents"}>
<div class="had-container">
   <{include file='user/nav.tpl'}>

<div class="section no-pad-bot" id="index-banner">
    <div class="container ">
      <h5 class="white-text">
          邀请
          <small>Invite</small>
      </h5>

        <div class="section">
          <div class="row card-panel color-panel light-blue lighten-5 z-depth-2">
            <div class="col s12 m12 l6">
              <div class="card-panel darken-1 hoverable">
                      <span class="white-text">
                      <h5 class="header black-text">邀请</h5>
                      <div class="black-text">
                        <p>当前您可以生成<code><{$InviteNum}></code>个邀请码。  </p>
                            <{if $InviteNum !=0}>
                                <button id="invite" class="btn waves-effect waves-light light-blue lighten-1">生成我的邀请码</button>
                            <{/if}>
                        <p>我的邀请码</p>
                        <div class="row card-panel no-padding-panel light-blue lighten-5 z-depth-2">
                        <{if count($code)!=null}>
                          <table class="centered striped responsive-table hoverable">
                                  <thead>
                                  <tr>
                                      <th>###</th>
                                      <th>邀请码</th>
                                      <th>状态</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <{foreach $code as $data}>
                                  <tr>
                                      <td><{$a++}></td>
                                       <td><{$data['code']}></td>
                                      <td>可用</td>
                                  </tr>
                                  <{/foreach}>
                                  </tbody>
                              </table>
                        <{else}>
                              <div class="section no-pad-bot hoverable">
                                  <div class="container">
                                          <div class="row center">
                                          <h5 class="header col s12 light">
                                              <p>没有邀请码啊。。。 (>_<)</p>
                                          </h5>
                                          </div>
                                  </div>
                              </div>
                        <{/if}>
                        </div>  
                    </div>
                 </span>
                </div>
            </div>

            <div class="row card-panel col s12 m12 l6 hoverable">
                  <div class="black-text">
                    <div class="col s12">
                        <div class="card-panel orange darken-1 hoverable">
                          <div class="white-text">
                              <h5>注意！</h5>
                              <p>邀请码请给认识的需要的人。</p>
                              <p>邀请有记录，若被邀请的人违反用户协议，您将会有连带责任。</p>
                          </div>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="card-panel light-blue accent-3 hoverable">
                          <div class="white-text">
                              <h5>说明</h5>
                              <p>用户注册48小时后，才可以生成邀请码。</p>
                              <p>邀请码暂时无法购买，请珍惜。</p>
                              <p>公共页面不定期发放邀请码，如果用完邀请码可以关注公共邀请。</p>
                          </div>
                        </div>
                    </div>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div id="msg-error" class="modal" style="z-index: 1003; opacity: 1; transform: scaleX(1); top: 5%;"title="点击关闭" onclick="$('#msg-error').closeModal();">
      <div class="modal-content" id="error-close">
            <h4><i class="mdi-alert-error" style="font-size: 1em;"></i>出错了!</h4>
            <p id="msg-error-p" style=" COLOR: RED; FONT-SIZE: x-large;"> </p>
      </div>
  <div class="modal-footer">
     <a href="#!" onclick="$('#msg-error').closeModal();" class="modal-action modal-close btn waves-light light-blue lighten-1 modal-action modal-close waves-effect waves-red">关闭</a>
  </div>
</div>
<{include file='footer.tpl'}> <{/block}> <{* 以上继承内容到父模板header.tpl 中的 contents *}>
<{extends file="Public_javascript.tpl" append}> <{block name="javascript"}>
<script>
    $(document).ready(function(){
        $("#invite").click(function(){
            $.ajax({
                type:"GET",
                url:"_invite.php",
                dataType:"json",
                success:function(data){
                    if(data.ok){
                        window.location.reload();
                    }else{
                        $("#msg-error").openModal();
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    $("#msg-error").openModal();
                    $("#msg-error-p").html("发生错误："+jqXHR.status);
                }
            })
        })
    })
</script><{/block}> <{* 以上继承内容到父模板 Public_javascript.tpl 中的 javascript *}>