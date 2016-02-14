{include file='user/main.tpl'}

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            节点列表
            <small>Node List</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- START PROGRESS BARS -->
        <div class="row">
            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-code"></i>
                        <h3 class="box-title">Config file</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="callout callout-warning">
                            <h4>注意!</h4>
                            <p>配置文件以及二维码请勿泄露！</p>
                        </div>

                    <code>
                        {$json}
                    </code>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col (right) -->

            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-code"></i>
                        <h3 class="box-title">二维码</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <p>{$ssqr}</p>
                        <div align="center">
                            <div id="qrcode"></div>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col (right) -->

            <script src=" /assets/public/js/jquery.qrcode.min.js "></script>
            <script>
                jQuery('#qrcode').qrcode({ "text" : "{$ssqr}" });
            </script>

        </div><!-- /.row -->
        <!-- END PROGRESS BARS -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
{include file='user/footer.tpl'}
