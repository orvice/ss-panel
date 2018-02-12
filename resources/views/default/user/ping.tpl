{include file='user/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            新建测试
            <small>New Test</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div id="msg-ing" class="alert alert-success" style="display: none">
                    <h4 id="msg-h4">
                        正在创建测试，请稍候...
                    </h4>
                </div>
            </div>
        </div>

        {if $active}
            <!-- START PROGRESS BARS -->
            <div class="row">
                {foreach $nodes as $node}
                    <div class="col-lg-3 col-xs-12 col-sm-6">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3 style="font-size: 28px;">{$node->name}</h3>

                                <p id="node{$node->id}">{$node->server}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-speedometer"></i>
                            </div>
                            <a href="javascript: launch({$node->id})" class="small-box-footer"> 新建测试 <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                {/foreach}
            </div>
            <!-- /.row --><!-- END PROGRESS BARS -->
        {else}
            <div class="row">
                <div class="col-sm-12">
                    <div id="msg-ing" class="alert alert-warning">
                        <h4 id="msg-h4">
                            请先激活服务再进行测试！
                        </h4>
                    </div>
                </div>
            </div>
        {/if}
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    function launch (id) {
        $("#msg-ing").css('display', 'block');
        $(".small-box-footer").attr('href', '#!');
        $.ajax({
            url: "/ping/launch",
            method: "POST",
            data: {
                node: $("#node" + id.toString()).html()
            },
            success: function (msg) {
                var dataObj = eval("(" + msg + ")");
                if (!dataObj) {
                    $("#msg-h4").html("与服务器通信失败。");
                    $("#msg-ing").removeClass("alert-success");
                    $("#msg-ing").addClass("alert-danger");
                }
                else if (!dataObj.result) {
                    $("#msg-h4").html("发生错误：" + dataObj.msg);
                    $("#msg-ing").removeClass("alert-success");
                    $("#msg-ing").addClass("alert-danger");
                }
                else {
                    window.location.href = "https://stat.2645net.work/task/" + dataObj.data.ID;
                }
            },
            error: function (xhr) {
                $("#msg-h4").html("与服务器通信错误。");
                $("#msg-ing").removeClass("alert-success");
                $("#msg-ing").addClass("alert-danger");
            }
        });
    };
</script>

{include file='user/footer.tpl'}