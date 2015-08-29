<{extends file="header.tpl"}><{block name="title" prepend}>用户管理 - <{/block}><{block name="contents"}>
    <!-- 加载dataTables样式文件 dataTables.bootstrap.css -->
    <link href="<{$resources_dir}>/asset/plugins/datatables/media/css/jquery.dataTables.min.css?<{$version}><{date('Ym')}>" rel="stylesheet" type="text/css" />
    <link href="<{$resources_dir}>/asset/plugins/datatables/media/css/dataTables.bootstrap.css?<{$version}><{date('Ym')}>" rel="stylesheet" type="text/css" />
    <link href="<{$resources_dir}>/asset/plugins/datatables/media/css/dataTables.colVis.min.css?<{$version}><{date('Ym')}>" rel="stylesheet" type="text/css" />
    <style>
      .btn-sm {
          padding: 0 1rem;
          margin-bottom: 5px;
          background-color: #31B3D6;
      }
      table {
          table-layout: fixed;
          word-wrap:break-word;
        }
      table.dataTable {
          width: 100%;
          margin: 0 auto;
          clear: both;
          border-collapse: separate;
          border-spacing: 0;
        }
      table.dataTable tbody tr {
          background-color: rgba(255, 255, 255, 0);
        }
      table.striped>tbody>tr:nth-child(odd) {
          background-color: rgba(255, 255, 255, 0.31);
        }
      table.hoverable>tbody>tr:hover {
          background-color: rgba(250, 248, 109, 0.86);
        }
      @media only screen and (max-width : 1042px) {
          table.dataTable {
          width: 100%;
          }
          table.dataTable tbody td {
          padding: 11px 10px;
          }
          table.dataTable thead > tr > th {
              padding-right: 35px;
          }
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
        <table id="user" class="centered striped responsive-table hoverable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>邮箱</th>
                    <th>端口</th>
                    <th>总流量</th>
                    <th>剩余流量</th>
                    <th>已用流量</th>
                    <th>上传流量</th>
                    <th>下载流量</th>
                    <th>注册时间</th>
                    <th>最后签到</th>
                    <th>最近使用</th>
                    <th>启用状态</th>
                    <th>邀请人</th>
                    <th>邀请码</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
               <{foreach $us as $rs}>
                    <tr>
                        <td><{$rs['uid']}></td>
                        <td><{$rs['user_name']}></td>
                        <td><{$rs['email']}></td>
                        <td><{$rs['port']}></td>
                        <td><{\Ss\Etc\Comm::flowAutoShow($rs['transfer_enable'])}></td>
                        <td><{\Ss\Etc\Comm::flowAutoShow(($rs['transfer_enable']-$rs['u']-$rs['d']))}></td>
                        <td><{\Ss\Etc\Comm::flowAutoShow(($rs['u']+$rs['d']))}></td>
                        <td><{\Ss\Etc\Comm::flowAutoShow($rs['u'])}></td>
                        <td><{\Ss\Etc\Comm::flowAutoShow($rs['d'])}></td>
                        <td><{$rs['reg_date']}></td>
                        <td><{date('Y-m-d H:i:s',$rs['last_check_in_time'])}></td>
                        <td><{date('Y-m-d H:i:s',$rs['t'])}></td>
                        <td><{if $rs['enable']}>正常<{else}><code>停止</code><{/if}></td>
                        <td><{get_ref_name rs=$rs['ref_by']}></td><{* 调用自定义插件 传$rs['ref_by'] 然后返回数据 *}>
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
<script type="text/javascript" language="javascript" src="<{$resources_dir}>/asset/plugins/datatables/media/js/file-size.js?<{$version}><{date('Ym')}>"></script>
<script type="text/javascript" language="javascript" src="<{$resources_dir}>/asset/plugins/datatables/media/js/dataTables.colVis.min.js?<{$version}><{date('Ym')}>"></script>
<script type="text/javascript">
  $(document).ready(function () {
        $('#user').dataTable({
            "language": {
                "url": "<{$resources_dir}>/asset/plugins/datatables/media/Chinese.json?<{$version}><{date('Ym')}>"
            },
            "bStateSave": true,
            columnDefs: [
           { type: 'file-size', targets: 4 },
           { type: 'file-size', targets: 5 },
           { type: 'file-size', targets: 6 },
           { type: 'file-size', targets: 7 },
           { type: 'file-size', targets: 8 }
        ],
        "dom": 'C<"clear">lfrtip',
        "colVis": {
            "buttonText": "显示/隐藏列",
            exclude: [ 0,1,15 ],
            restore: "还原",
            showAll: "显示所有",
            showNone: "不显示",
            groups: [
                {
                    title: "只看流量",
                    columns: [ 9,10,11,12,13,14 ]
                },
                {
                    title: "只看日期",
                    columns: [ 4,5,6,7,8,12,13,14 ]
                },
                {
                    title: "只看状态/邀请",
                    columns: [ 4,5,6,7,8,9,10,11 ]
                }
            ]
        }
        });
    });
</script>
<{/block}> <{* 以上继承内容到父模板 Public_javascript.tpl 中的 javascript *}>
