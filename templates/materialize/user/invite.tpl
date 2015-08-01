<{extends file="header.tpl"}><{block name="title" prepend}>邀请 - <{/block}>
<{block name="contents"}>
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
                              <{$user_invite_Announcement_color_orange}><{* 橙色公告内容 *}>
                          </div>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="card-panel light-blue accent-3 hoverable">
                          <div class="white-text">
                              <{$user_invite_Announcement_color_blue}><{* 蓝色公告内容 *}>
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
<{include file='footer.tpl'}> <{/block}> <{* 以上继承内容到父模板header.tpl 中的 contents *}>
<{extends file="Public_javascript.tpl" append}> <{block name="javascript"}>
<{* 请在下面加入你的 javascript *}>
<script type="text/javascript" src="<{$resources_dir}>/asset/js/Prompt_message.js?<{$version}><{date('Ym')}>"></script>
<script type="text/javascript">
  _Prompt_msg();
</script>
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