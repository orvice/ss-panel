<{extends file="header.tpl"}><{block name="title" prepend}>节点列表 - <{/block}><{block name="contents"}>
<div class="had-container">
   <{include file='admin/nav.tpl'}>
   <style>
     .btn {
      margin-bottom: 5px;
      }
   </style>
<div class="section no-pad-bot" id="index-banner">
    <div class="container ">
      <h5 class="white-text">
          节点列表
          <small>Node List</small>
      </h5>

        <div class="section">
        <p> <a class="btn waves-effect waves-light light-blue cyan accent-3" href="node_add.php">添加</a> </p>
          <div class="row card-panel no-padding-panel color-panel light-blue lighten-5 z-depth-2">
            <div class="center black-text">
                <table class="centered striped responsive-table hoverable">
                <thead>
                      <tr>
                          <th>ID</th>
                          <th>节点</th>
                          <th>加密</th>
                          <th>描述</th>
                          <th>排序</th>
                          <th>操作</th>
                      </tr>
                </thead>
                      <{foreach $node as $rs}>
                          <tr>
                              <td><{$rs['id']}></td>
                              <td><{$rs['node_name']}></td>
                              <td><{$rs['node_method']}></td>
                              <td><{$rs['node_info']}></td>
                              <td><{$rs['node_order']}></td>
                              <td>
                                  <a class="btn waves-effect waves-light light-blue lighten-1" href="node_edit.php?id=<{$rs['id']}>">编辑</a>
                                  <a class="btn waves-effect waves-light red accent-4" href="node_del.php?id=<{$rs['id']}>" onclick="JavaScript:return confirm('确定删除吗？')">删除</a>
                              </td>
                          </tr>
                      <{/foreach}>
                  </table>
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