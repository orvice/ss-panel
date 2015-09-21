<{extends file="header.tpl"}><{block name="title" prepend}>节点编辑 - <{/block}><{block name="contents"}>
<div class="had-container">
   <{include file='admin/nav.tpl'}>

<div class="section no-pad-bot" id="index-banner">
    <div class="container ">
      <h5 class="white-text">
          节点编辑
          <small>Node Update</small>
      </h5>

        <div class="section">
          <div class="row card-panel color-panel light-blue lighten-5 z-depth-2 hoverable">
            <div class="col s12">
              <div class="card-panel darken-1 hoverable">
                      <span class="white-text">
                      <h5 class="header black-text">节点编辑</h5>
                      <div class="black-text">
                          <form role="form" method="post" action="javascript:void(0);">
                              <div class="input-field">
                                <input id="node_name" type="text" name="node_name" value="<{$rs['node_name']}>" class="validate">
                                <label for="node_name">节点名字</label>
                              </div>
                              <div class="input-field">
                                <input id="node_server" type="text" name="node_server" value="<{$rs['node_server']}>" class="validate">
                                <label for="node_server">节点地址</label>
                              </div>
                              <div>
                                <label for="node_method">加密方式</label>
                                <select id="node_method" class="browser-default" onchange="changeForm(this.value)" >
                                  <{$method = strtolower($rs['node_method'])}>
                                  <option value="custom_node_method">自定义加密方式</option>
                                  <option value="rc4-md5" <{if $method =="rc4-md5"}>selected="selected"<{/if}> >rc4-md5</option>
                                  <option value="aes-256-cfb" <{if $method =="aes-256-cfb"}>selected="selected"<{/if}> >aes-256-cfb</option>
                                  <option value="aes-192-cfb" <{if $method =="aes-192-cfb"}>selected="selected"<{/if}> >aes-192-cfb</option>
                                  <option value="aes-128-cfb" <{if $method =="aes-128-cfb"}>selected="selected"<{/if}> >aes-128-cfb</option>
                                  <option value="rc4" <{if $method =="rc4"}>selected="selected"<{/if}> >rc4</option>
                                  <option value="salsa20" <{if $method =="salsa20"}>selected="selected"<{/if}> >salsa20</option>
                                  <option value="chacha20" <{if $method =="chacha20"}>selected="selected"<{/if}> >chacha20</option>
                                  <option value="table" <{if $method =="table"}>selected="selected"<{/if}> >table</option>
                                </select>
                              </div>
                              <div class="input-field" id="custom_node_method_css">
                                <input id="custom_node_method" type="text" name="custom_node_method" class="validate" value="<{$rs['node_method']}>">
                                <label for="custom_node_method">自定义加密方式</label>
                              </div>
                              <div class="input-field">
                                <textarea id="node_info" type="text" name="node_info" class="materialize-textarea"><{$rs['node_info']}></textarea>
                                <label for="node_info">节点描述</label>
                              </div>
                              <div class="input-field">
                                <input id="node_type" type="text" name="node_type" value="<{$rs['node_type']}>" class="validate">
                                <label for="node_type">分类(0或者1)</label>
                              </div>
                              <div class="input-field">
                                <input id="node_status" type="text" name="node_status" value="<{$rs['node_status']}>" class="validate">
                                <label for="node_status">状态</label>
                              </div>
                              <div class="input-field">
                                <input id="node_order" type="text" name="node_order" value="<{$rs['node_order']}>" class="validate">
                                <label for="node_order">排序</label>
                              </div>
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
                url:"node_edit.php",
                dataType:"json",
                data:{
                    node_id: "<{$id}>",
                    node_name: $("#node_name").val(),
                    node_server: $("#node_server").val(),
                    node_method: $("#node_method").val()=="custom_node_method" ? $("#custom_node_method").val() : $("#node_method").val(),
                    node_info: $("#node_info").val(),
                    node_type: $("#node_type").val(),
                    node_status: $("#node_status").val(),
                    node_order: $("#node_order").val()
                },
                success:function(data){
                    if(data.ok){
                        $("#msg-error").closeModal();
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
    function changeForm(value){
      if(value=="custom_node_method") {
          $('#custom_node_method_css').show(200);
      }else{
          $('#custom_node_method_css').hide(200);
      }
    }
    window.onload = changeForm($("#node_method").val());
</script><{/block}> <{* 以上继承内容到父模板 Public_javascript.tpl 中的 javascript *}>