{include file='admin/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            节点列表
            <small>Node List</small>
            <small><small>如需修改加密方式、协议及混淆插件，请至用户管理界面修改</small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <p> <a class="btn btn-success btn-sm" href="/admin/node/create">添加</a> </p>
                <div class="box">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>节点</th>
                                <th>节点地址</th>
                                <th>默认协议</th>
                                <th>默认混淆</th>
                                <th>默认加密</th>
                                <th>流量比例</th>
                                <th>是否显示</th>
                                <th>节点状态</th>
                                <th>描述</th>
                                <th>排序</th>
                                <th>操作</th>
                            </tr>
                            {foreach $nodes as $node}
                            <tr>
                                <td>#{$node->id}</td>
                                <td>{$node->name}</td>
                                <td>{$node->server}</td>
                                <td>{$node->protocol}</td>
                                <td>{$node->obfs}</td>
                                <td>{$node->method}</td>
                                <td>{$node->traffic_rate}</td>
                                <td>{if $node->type==1}{显示}else{隐藏}{/if}</td>
                                <td>{$node->status}</td>
                                <td>{$node->info}</td>
                                <td>{$node->sort}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="/admin/node/{$node->id}/edit">编辑</a>
                                    <a class="btn btn-danger btn-sm" id="delete" value="{$node->id}" href="/admin/node/{$node->id}/delete">删除</a>
                                </td>
                            </tr>
                            {/foreach}
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<script>
    $(document).ready(function(){
        function delete(){
            $.ajax({
                type:"DELETE",
                url:"/admin/node/",
                dataType:"json",
                data:{
                    name: $("#name").val()
                },
                success:function(data){
                    if(data.ret){
                        $("#msg-error").hide(100);
                        $("#msg-success").show(100);
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='/admin/node'", 2000);
                    }else{
                        $("#msg-error").hide(10);
                        $("#msg-error").show(100);
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    $("#msg-error").hide(10);
                    $("#msg-error").show(100);
                    $("#msg-error-p").html("发生错误："+jqXHR.status);
                }
            });
        }
        $("html").keydown(function(event){
            if(event.keyCode==13){
                login();
            }
        });
        $("#delete").click(function(){
            delete();
        });
        $("#ok-close").click(function(){
            $("#msg-success").hide(100);
        });
        $("#error-close").click(function(){
            $("#msg-error").hide(100);
        });
    })
</script>

{include file='admin/footer.tpl'}
