{include file='admin/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            用户列表
            <small>User List</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div id="msg-success" class="alert alert-success alert-dismissable" style="display: none;">
                    <button type="button" class="close" id="ok-close" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-info"></i> 成功!</h4>

                    <p id="msg-success-p"></p>
                </div>
                <div id="msg-error" class="alert alert-warning alert-dismissable" style="display: none;">
                    <button type="button" class="close" id="error-close" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> 出错了!</h4>

                    <p id="msg-error-p"></p>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 0.6em; margin-bottom: 0.3em; margin-left: 0em; margin-right: 0em;">
            <form method="get" class="form-inline">
                <input class="form-control" id="search_email"
                       name="email" placeholder="搜索用户邮箱..." value="{$search_email}">
                <button type="submit" id="search" class="btn btn-primary">搜索</button>
            </form>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body table-responsive no-padding">
                        {$users->render()}
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>邮箱</th>
                                <th>端口</th>
                                <th>状态</th>
                                <th>加密方式</th>
                                <th>协议插件</th>
                                <th>协议参数</th>
                                <th>混淆插件</th>
                                <th>混淆参数</th>
                                <th>V2Ray Level</th>
                                <th>V2Ray AlterID</th>
                                <th>已用流量/总流量</th>
                                <th>最后在线时间</th>
                                <th>最后签到时间</th>
                                <th>注册时间</th>
                                <th>注册IP</th>
                                <th>邀请者</th>
                                <th>操作</th>
                            </tr>
                            {foreach $users as $user}
                            <tr>
                                <td>#{$user->id}</td>
                                <td><abbr title="{$user->user_name}">{$user->email}</abbr></td>
                                <td>{$user->port}</td>
                                <td>{$user->enable}</td>
                                <td>{$user->method}</td>
                                <td>{$user->protocol}</td>
                                <td>{$user->protocol_param}</td>
                                <td>{$user->obfs}</td>
                                <td>{$user->obfs_param}</td>
                                <td>{$user->v2ray_level}</td>
                                <td>{$user->v2ray_alter_id}</td>
                                <td>{$user->usedTraffic()}/{$user->enableTraffic()}</td>
                                <td>{$user->lastSsTime()}</td>
                                <td>{$user->lastCheckInTime()}</td>
                                <th>{$user->reg_date}</th>
                                <th>{$user->reg_ip}</th>
                                <th>{$user->ref_by}</th>
                                <td>
                                    <a class="btn btn-info btn-sm" href="/admin/user/{$user->id}/edit">编辑</a>
                                    <a class="btn btn-danger btn-sm" onclick="deleteUser({$user->id})">删除</a>
                                </td>
                            </tr>
                            {/foreach}
                        </table>
                        {$users->render()}
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<script>
    //$(document).ready(function () {
        function deleteUser(userId){
            if (!confirm("确定要删除用户 #"+userId+" 吗？")){
                return;
            }
            $.ajax({
                type:"DELETE",
                url:"/admin/user/"+userId,
                dataType:"json",
                data:{
                    id: userId
                },
                success:function(data){
                    if(data.ret){
                        $("#msg-error").hide(100);
                        $("#msg-success").show(100);
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='/admin/user'", 2000);
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
        $("#ok-close").click(function(){
            $("#msg-success").hide(100);
        });
        $("#error-close").click(function(){
            $("#msg-error").hide(100);
        });
    //})
</script>

{include file='admin/footer.tpl'}