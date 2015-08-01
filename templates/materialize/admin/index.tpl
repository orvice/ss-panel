<{extends file="header.tpl"}> <{block name="title" prepend}>用户中心 - <{/block}><{block name="contents"}>
<div class="had-container">
   <{include file='admin/nav.tpl'}>
<style type="text/css">
  .btn0{width: 100%;}
</style>
<div class="section no-pad-bot" id="index-banner">
    <div class="container ">
      <h5  class="white-text">
          用户中心
          <small>User Center</small>
      </h5>
        <div class="section">
          <div class="row card-panel color-panel light-blue lighten-5 z-depth-2">
            <div class="col s12 m12 l6">
              <div class="card-panel light-blue accent-3 hoverable">
                      <span class="white-text">
                      <h5 class="header center">
                      <div class="center">
                            <h3>
                                <{$node_count}>
                            </h3>
                            <p>
                                节点
                            </p>
                        </div>
                      </h5>
                      <div class="center white-text">
                       <a href="node.php" class="btn btn0 waves-effect waves-light light-blue lighten-5 teal-text center">
                            管理
                        </a>
                      </div>
                 </span>     
                </div>
            </div>

            <div class="col s12 m12 l6">
                <div class="card-panel orange darken-1 hoverable">
                  <span class="blue-text">
                    <h5 class="header center white-text ">
                      <div class="center">
                              <h3>
                                  <{$all_user}>
                              </h3>
                              <p>
                                  用户
                              </p>
                      </div>
                    </h5>
                      <div class="center white-text">
                        <a href="user.php" class="btn btn0 waves-effect waves-light light-blue lighten-5 teal-text center">
                            查看
                        </a>
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

<{/block}> <{* 以上继承内容到父模板 Public_javascript.tpl 中的 javascript *}>