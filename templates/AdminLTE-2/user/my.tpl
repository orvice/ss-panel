<{block name=main}>
<{include file='user/main.tpl'}>
<{/block}>
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户中心
                <small>User Center</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-body">
                            <p>用户名：<{$GetUserName}></p>
                            <p>邮箱：<{$user_email}></p>
                            <p> 套餐：<span class="label label-info"> <{$get_plan}> </span> </p>
                            <p> 账户余额：<{$get_money}>元 </p>
                            <{block name=a}>
                            <p><a class="btn btn-danger btn-sm" href="kill.php">删除我的账户</a></p>
                            <{/block}>
                        </div><!-- /.box -->
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<{include file='Public_javascript.tpl'}>
<!-- 在下面添加功能引用的js -->

<{include file='user/footer.tpl'}>