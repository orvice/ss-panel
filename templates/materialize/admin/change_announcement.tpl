<{extends file="header.tpl"}><{block name="title" prepend}>修改<{$announcement_title}> - <{/block}><{block name="contents"}>
<div class="had-container">
   <{include file='admin/nav.tpl'}>

<div class="section no-pad-bot" id="index-banner">
    <div class="container ">
      <h5 class="white-text">
          修改公告
          <small>Change announcement</small>
      </h5>
        <div class="section">
          <div class="row card-panel color-panel light-blue lighten-5 z-depth-2 hoverable">
          <{if $announcement_name!=null}>
            <div class="col s12">
              <div class="card-panel darken-1 hoverable">
                      <span class="white-text">
                      <h5 class="header black-text">修改<{$announcement_title}></h5>
                      <div class="black-text">
                          <form role="form" method="post" action="javascript:submit();">
                              <div class="input-field">
                              <{textareaCodemirror name="new_content" id="new_content" class="textarea"}><{$original_content}><{/textareaCodemirror}>
                              </div>
                                  <button id="change" type="submit" class="btn waves-effect waves-light light-blue lighten-1">修改</button>
                          </form>
                      </div>
                 </span> 
                </div>
            </div>
          <{else}>
            <div class="col s12">
                <div class="card-panel darken-1 hoverable">
                        <span class="white-text">
                        <h5 class="header black-text center">没有这个公告名称</h5>
                   </span> 
                  </div>
              </div>
          <{/if}>
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
<script type="text/javascript">
function submit(){
  $(document).ready(function(){
            $.ajax({
                type:"POST",
                url:"_change_announcement.php",
                dataType:"json",
                data:{
                    announcement_name: "<{$announcement_name}>",
                    new_content: $("#new_content").val(),
                    
                },
                success:function(data){
                    if(data.ok){
                        $("#msg-success").openModal();
                        $("#msg-success-p").html(data.msg);
                    }else{
                        $("#msg-error").openModal();
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    $("#msg-error-p").html("发生错误："+jqXHR.status);
                    $("#msg-error").openModal();
                }
            })
    })
}
</script><{/block}> <{* 以上继承内容到父模板 Public_javascript.tpl 中的 javascript *}>