<{extends file="header.tpl"}><{block name="title" prepend}>用户管理 - <{/block}><{block name="contents"}>
    <!-- 加载dataTables样式文件 dataTables.bootstrap.css -->
    <link href="<{$resources_dir}>/asset/plugins/datatables/media/css/jquery.dataTables.min.css?<{$version}><{date('Ym')}>" rel="stylesheet" type="text/css" />
    <link href="<{$resources_dir}>/asset/plugins/datatables/media/css/dataTables.bootstrap.css?<{$version}><{date('Ym')}>" rel="stylesheet" type="text/css" />
    <style>
      .btn{
        padding: 0 1rem;
      }
      .btn-sm {
          margin-bottom: 5px;
        background-color: #31B3D6;
      }
      table.dataTable tbody td {
          padding: 11px 10px;
      }
    </style>
<div class="had-container">
   <{include file='admin/nav.tpl'}>
<!--   <div class="container">
    <div class="section"> -->
      <h5 class="white-text">
          用户管理
          <small>User Manage</small>
      </h5>   
      <div class="row card-panel no-padding-panel light-blue lighten-5 z-depth-2" id="index-banner">
        <table id="example1" class="centered striped responsive-table hoverable">
                <thead>
                <tr>
                    <th>ID</th>
                      <th>用户名</th>
                      <th>邮箱</th>
                      <th>端口</th>
                      <th>总流量</th>
                      <th>剩余流量</th>
                      <th>已用流量</th>
                      <th>最后签到</th>
                      <th>邀请码</th>
                      <th>操作</th>
                </tr>
                </thead>
                <tbody>
               <{*  <{foreach_user us=$us}> 调用自定义插件 传$us 然后返回数据 *}>
               <{foreach $us as $rs}>
                    <tr>
                        <td><{$rs['uid']}></td>
                        <td><{$rs['user_name']}></td>
                        <td><{$rs['email']}></td>
                        <td><{$rs['port']}></td>
                        <td><{\Ss\Etc\Comm::flowAutoShow($rs['transfer_enable'])}></td>
                        <td><{\Ss\Etc\Comm::flowAutoShow(($rs['transfer_enable']-$rs['u']-$rs['d']))}></td>
                        <td><{\Ss\Etc\Comm::flowAutoShow(($rs['u']+$rs['d']))}></td>
                        <td><{date('Y-m-d H:i:s',$rs['last_check_in_time'])}></td>
                        <td><{$rs['invite_num']}></td>
                        <td>
                            <a class="btn btn-sm waves-effect waves-light" href="user_edit.php?uid=<{$rs['uid']}>">查看</a>
                            <a class="btn btn-sm waves-effect waves-light red accent-4" href="user_del.php?uid=<{$rs['uid']}>" onclick="JavaScript:return confirm('确定删除吗？')">删除</a>
                        </td>
                    </tr>
                <{/foreach}>
                </tbody>
            </table>
<!--       </div>
    </div> -->
  </div>
</div>

<{include file='footer.tpl'}> <{/block}> <{* 以上继承内容到父模板header.tpl 中的 contents *}>
<{extends file="Public_javascript.tpl" append}> <{block name="javascript"}>
<{* 请在下面加入你的 javascript *}>
<!-- 下面加载 dataTables 要用的 js 文件 -->
<script src="<{$resources_dir}>/asset/plugins/datatables/media/js/jquery.dataTables.min.js?<{$version}><{date('Ym')}>" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function () {
        $('#example1').dataTable({
            "language": {
                "url": "<{$resources_dir}>/asset/plugins/datatables/media/Chinese.json?<{$version}><{date('Ym')}>"
            }
        });
    });
</script>
<{/block}> <{* 以上继承内容到父模板 Public_javascript.tpl 中的 javascript *}>