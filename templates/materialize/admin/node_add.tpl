<{extends file="header.tpl"}><{block name="title" prepend}>节点添加 - <{/block}><{block name="contents"}>
<div class="had-container">
   <{include file='admin/nav.tpl'}>

<div class="section no-pad-bot" id="index-banner">
    <div class="container ">
      <h5 class="white-text">
          节点添加
          <small>Add Node</small>
      </h5>

        <div class="section">
          <div class="row card-panel color-panel light-blue lighten-5 z-depth-2 hoverable">
            <div class="col s12">
              <div class="card-panel darken-1 hoverable">
                      <span class="white-text">
                      <h5 class="header black-text">节点添加</h5>
                      <div class="black-text">
                          <form role="form" method="post" action="node_add.php">
                              <div class="input-field" style="display:none">
                                <input id="node_id" type="text" name="node_id" class="validate">
                                <label for="node_id">ID</label>
                              </div>
                              <div class="input-field">
                                <input id="node_name" type="text" name="node_name" class="validate">
                                <label for="node_name">节点名字</label>
                              </div>
                              <div class="input-field">
                                <input id="node_server" type="text" name="node_server" class="validate">
                                <label for="node_server">节点地址</label>
                              </div>
                              <div class="input-field">
                                <input id="node_method" type="text" name="node_method" class="validate">
                                <label for="node_method">加密方式</label>
                              </div>
                              <div class="input-field">
                                <input id="node_info" type="text" name="node_info" class="validate">
                                <label for="node_info">节点描述</label>
                              </div>
                              <div class="input-field">
                                <input id="node_type" type="text" name="node_type" class="validate">
                                <label for="node_type">分类(0或者1)</label>
                              </div>
                              <div class="input-field">
                                <input id="node_status" type="text" name="node_status" class="validate">
                                <label for="node_status">状态</label>
                              </div>
                              <div class="input-field">
                                <input id="node_order" type="text" name="node_order" class="validate">
                                <label for="node_order">排序</label>
                              </div>
                                  <button id="pwd-update" type="submit" class="btn waves-effect waves-light light-blue lighten-1">添加</button>
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


<div id="ss-msg-success" class="modal" style="z-index: 1003; opacity: 1; transform: scaleX(1); top: 5%;">
    <div class="modal-content" id="ok-close">
        <h4><i class="mdi-image-tag-faces" style="font-size: 1em;"></i>成功了!</h4>
        <p id="ss-msg-success-p" style=" COLOR: deepskyblue; FONT-SIZE: x-large;"></p>
    </div>
    <div class="modal-footer">
         <a href="#!" onclick="$('#ss-msg-success').closeModal();" class="modal-action modal-close btn waves-light light-blue lighten-1 modal-action modal-close waves-effect waves-red">关闭</a>
    </div>
</div>
<div id="ss-msg-error" class="modal" style="z-index: 1003; opacity: 1; transform: scaleX(1); top: 5%;" title="点击关闭" onclick="$('#ss-msg-error').closeModal();">
      <div class="modal-content" id="ss-error-close">
            <h4><i class="mdi-alert-error" style="font-size: 1em;"></i>出错了!</h4>
            <p id="ss-msg-error-p" style=" COLOR: RED; FONT-SIZE: x-large;"> </p>
      </div>
  <div class="modal-footer">
     <a href="#!" onclick="$('#ss-msg-error').closeModal();" class="modal-action modal-close btn waves-light light-blue lighten-1 modal-action modal-close waves-effect waves-red">关闭</a>
  </div>
</div>

<{include file='footer.tpl'}> <{/block}> <{* 以上继承内容到父模板header.tpl 中的 contents *}>
<{extends file="Public_javascript.tpl" append}> <{block name="javascript"}>
<{* 请在下面加入你的 javascript *}>
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