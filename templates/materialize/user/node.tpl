<{extends file="header.tpl"}><{block name="title" prepend}>节点列表 - <{/block}>
<{block name="contents"}>
<{config_load file='Announcement.conf' section='user_node'}><{* 加载模板公告内容配置 *}>
<div class="had-container">
   <{include file='user/nav.tpl'}>

<div class="section no-pad-bot" id="index-banner">
    <div class="container ">
      <h5 class="white-text">
          节点列表
          <small>Node List</small>
      </h5>
          <div class="row">
            <div class="col s12 m6 card-panel hoverable">
              <span class="header black-text">
                <h5 class="header black-text"><i class="mdi-editor-format-list-numbered" style="font-size: 1em;"></i>「 节点 」</h5>
                  <div class="col s12 orange darken-1 hoverable">
                  <span class="white-text">
                    <h5 class="header black-text"><{#Announcement_node#}><{* 普通节点公告内容 *}></h5>                  
                  </span>
                </div>
                <{if count($node0)!=null}><{* 如果有邀请码就显示，没有就显示文字。*}>
                  <{assign var="a" value="1"}>
                  <{foreach $node0 as $row}><!-- <{$a++}> -->
                      <div class="col s12 card-panel hoverable <{if $a%2==0}>light-blue lighten-5<{else}>yellow lighten-5<{/if}>">
                      <ul id="node<{$row['id']}>" class="dropdown-content">
                        <li><a href="#!" onclick="rel_url(this);" rel="../user/node_qr.php?id=<{$row['id']}>" class="waves-effect waves-red" title="<{$row['node_name']}>">二维码</a></li>
                        <li><a href="#!" onclick="rel_url(this);" rel="../user/node_json.php?id=<{$row['id']}>" class="waves-effect waves-red" title="<{$row['node_name']}>">配置文件</a></li>
                      </ul>
                      <i class="mdi-navigation-chevron-right" style="font-size: 1em;"></i>&nbsp;&nbsp;<{$row['node_name']}><a class="btn waves-effect waves-light light-blue lighten-1 dropdown-button ss_node_btn" href="#!" data-activates="node<{$row['id']}>">查看<i class="mdi-navigation-arrow-drop-down right"></i></a>
                      <hr/>
                          <div class="tab-content">
                              <div class="tab-pane active" id="tab_1-1">
                                  <p> <b class="btn waves-effect waves-light deep-purple accent-1 ss_node_btn0">地址:</b> <b class="btn ss_node_btn0 waves-effect"><{$row['node_server']}></b>
                                      <b class="btn waves-effect waves-light amber darken-3 ss_node_btn0"><{$row['node_status']}></b>
                                      <b class="btn waves-effect waves-light green accent-4 ss_node_btn0"><{$row['node_method']}></b>
                                  </p>
                                  <p> <{$row['node_info']}></p>
                              </div>
                          </div>
                      </div>
                  <{/foreach}>
                <{else}>
                  <div class="col s12 card-panel hoverable light-blue lighten-5">
                    <p class="center">                            
                    没有节点信息
                    </p>
                  </div>
                <{/if}>
              </span>
            </div>
            <div class="col s12 m6 card-panel hoverable">
              <span class="header black-text">
                <h5 class="header black-text"><i class="mdi-device-storage" style="font-size: 1em;"></i>『 Pro节点 』</h5>
                  <div class="col s12 orange darken-1 hoverable">
                      <span class="white-text">
                        <h5 class="header black-text"><{#Announcement_node_pro#}><{* pro节点公告内容 *}></h5>
                      </span>
                    </div>
                        <{if count($node1)!=null}><{* 如果有邀请码就显示，没有就显示文字。*}>
                        <{assign var="i" value="1"}>
                          <{foreach $node1 as $row}><!-- <{$i++}> -->
                               <div class="col s12 card-panel hoverable <{if $i%2==0}>light-blue darken-1 white-text<{else}>light-blue lighten-1 white-text<{/if}>">
                                  <ul id="node_Pro<{$row['id']}>" class="dropdown-content">
                                    <li><a href="#!" onclick="rel_url(this);" rel="../user/node_qr.php?id=<{$row['id']}>" class="waves-effect waves-red" title="<{$row['node_name']}>">二维码</a></li>
                                    <li><a href="#!" onclick="rel_url(this);" rel="../user/node_json.php?id=<{$row['id']}>" class="waves-effect waves-red" title="<{$row['node_name']}>">配置文件</a></li>
                                  </ul>
                                  <i class="mdi-navigation-chevron-right" style="font-size: 1em;"></i>&nbsp;&nbsp;<{$row['node_name']}><a class="btn waves-effect waves-light light-blue lighten-5 teal-text dropdown-button ss_node_btn" href="#!" data-activates="node_Pro<{$row['id']}>">查看<i class="mdi-navigation-arrow-drop-down right"></i></a>
                                  <hr/>
                                  <div class="tab-content">
                                      <div class="tab-pane active" id="tab_1-1">
                                          <p> <b class="btn waves-effect waves-light deep-purple accent-1 ss_node_btn0">地址:</b> <b class="btn ss_node_btn0 waves-effect" ><{$row['node_server']}></b>
                                              <b class="btn waves-effect waves-light amber darken-3 ss_node_btn0"><{$row['node_status']}></b>
                                              <b class="btn waves-effect waves-light green accent-4 ss_node_btn0"><{$row['node_method']}></b>
                                          </p>
                                          <p><{$row['node_info']}></p>
                                      </div>
                                  </div>
                              </div>
                          <{/foreach}>
                        <{else}>
                          <div class="col s12 card-panel hoverable light-blue darken-1">
                            <p class="white-text center">                            
                            没有节点信息
                            </p>
                          </div>
                        <{/if}>
              </span>
            </div>
          </div>
      </div>
    </div>
</div> 
  <div id="modalnode" class="modal"><!--  modal-fixed-footer -->
    <div class="modal-content">
        <div id="no_node" style="margin: 20% 1% 1% 36%; display: none;">
            <!-- 循环闪烁的颜色 -->
            <div class="container">
                <div class="preloader-wrapper big active">
                  <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                      <div class="circle"></div>
                    </div><div class="gap-patch">
                      <div class="circle"></div>
                    </div><div class="circle-clipper right">
                      <div class="circle"></div>
                    </div>
                  </div>

                  <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                      <div class="circle"></div>
                    </div><div class="gap-patch">
                      <div class="circle"></div>
                    </div><div class="circle-clipper right">
                      <div class="circle"></div>
                    </div>
                  </div>

                  <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                      <div class="circle"></div>
                    </div><div class="gap-patch">
                      <div class="circle"></div>
                    </div><div class="circle-clipper right">
                      <div class="circle"></div>
                    </div>
                  </div>

                  <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                      <div class="circle"></div>
                    </div><div class="gap-patch">
                      <div class="circle"></div>
                    </div><div class="circle-clipper right">
                      <div class="circle"></div>
                    </div>
                  </div>
                </div>
            </div>        
        </div>
        <div id="node"></div>      
    </div>
    <div class="modal-footer">   
      <a href="#!" onclick="$('#modalnode').closeModal();" class="btn waves-light light-blue lighten-1 modal-action modal-close waves-effect waves-green">关闭</a>
      <div id="node_btn"></div>
    </div>
  </div>
<{include file='footer.tpl'}> <{/block}> <{* 以上继承内容到父模板header.tpl 中的 contents *}>
<{extends file="Public_javascript.tpl" append}> <{block name="javascript"}>
<{* 请在下面加入你的 javascript *}>
<script type="text/javascript">
console.log(document.getElementsByTagName("a").onclick);
// 定义ID是否显示
var no_node=document.getElementById('no_node');
var node=document.getElementById('node');
// 显示加载，不显示内容。
function open_css(){
  no_node.style.display="block";
  node.style.display="none";
}
// 显示内容，不显示加载。
function close_css(){
  no_node.style.display="none";
  node.style.display="block";
}
// 获取被点击的a标签rel内容，然后加载内容到 modalnode ID中。
function rel_url(obj){
  // console.log(obj.id);
  // console.log(obj.rel);
  open_css();
  $('#node').load(obj.rel);
  $('#modalnode').openModal();
}
</script>
<script src="<{$resources_dir}>/asset/js/jquery.qrcode.min.js"></script><{/block}> <{* 以上继承内容到父模板 Public_javascript.tpl 中的 javascript *}>