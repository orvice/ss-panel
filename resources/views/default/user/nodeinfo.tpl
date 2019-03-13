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
            <div class="col-lg-12">
                <div class="callout callout-warning">
                    <h4>注意!</h4>

                    <p>配置文件以及二维码请勿泄露！</p>
                </div>
            </div>
            {if $ss}
                <div class="col-lg-9">
                    <div class="box box-solid">
                        <div class="box-header">
                            <i class="fa fa-code"></i>

                            <h3 class="box-title">SS 配置Json</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <textarea class="form-control" rows="3">{$json_show}</textarea>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <div class="box box-solid">
                        <div class="box-header">
                            <i class="fa fa-code"></i>

                            <h3 class="box-title">SS 配置地址</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="input-group">
                                <input type="text" id="ss-qr-text" class="form-control" value="{$ssqr}">
                                <div class="input-group-btn">
                                    <a class="btn btn-primary btn-flat" href="{$ssqr}">></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col (right) -->
                <div class="col-lg-3">
                    <div class="box box-solid">
                        <div class="box-header">
                            <i class="fa fa-qrcode"></i>

                            <h3 class="box-title">SS 配置二维码</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="text-center">
                                <div id="ss-qr"></div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col (right) -->
            {/if}
        </div>
        {if $ssr}
            <div class="row">
                <div class="col-lg-9">
                    <div class="box box-solid bg-maroon-gradient">
                        <div class="box-header">
                            <i class="fa fa-code"></i>

                            <h3 class="box-title">SSR 配置Json</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <textarea class="form-control" rows="6">{$jsonr_show}</textarea>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <div class="box box-solid bg-maroon-gradient">
                        <div class="box-header">
                            <i class="fa fa-code"></i>

                            <h3 class="box-title">SSR 配置地址</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="input-group">
                                <input type="text" id="ssr-qr-text" class="form-control" value="{$ssrqr}">
                                <div class="input-group-btn">
                                    <a class="btn btn-primary btn-flat" href="{$ssrqr}">></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col (right) -->

                <div class="col-lg-3">
                    <div class="box box-solid bg-maroon-gradient">
                        <div class="box-header">
                            <i class="fa fa-qrcode"></i>

                            <h3 class="box-title">SSR 配置二维码</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="text-center">
                                <div id="ssr-qr"></div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col (right) -->
            </div>
        {/if}
        {if $ssr_add}
			<!-- 单端口 -->
            <div class="row">
                <div class="col-lg-9">
                    <div class="box box-solid bg-maroon">
                        <div class="box-header">
                            <i class="fa fa-code"></i>

                            <h3 class="box-title">SSR 配置Json</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <textarea class="form-control" rows="6">{$jsonrd_show}</textarea>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <div class="box box-solid bg-maroon">
                        <div class="box-header">
                            <i class="fa fa-code"></i>

                            <h3 class="box-title">SSR 配置地址</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="input-group">
                                <input type="text" id="ssrd-qr-text" class="form-control" value="{$ssrdqr}">
                                <div class="input-group-btn">
                                    <a class="btn btn-primary btn-flat" href="{$ssrdqr}">></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col (right) -->

                <div class="col-lg-3">
                    <div class="box box-solid bg-maroon">
                        <div class="box-header">
                            <i class="fa fa-qrcode"></i>

                            <h3 class="box-title">SSR 配置二维码</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="text-center">
                                <div id="ssrd-qr"></div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col (right) -->
            </div>
        {/if}
        {if $v2ray}
            <div class="row">
                <div class="col-lg-6">
                    <div class="box box-solid bg-fuchsia">
                        <div class="box-header">
                            <i class="fa fa-code"></i>

                            <h3 class="box-title">V2Ray 配置Json</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <textarea class="form-control" rows="10">{$jsonv_show}</textarea>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col (right) -->

                <div class="col-lg-3">
                    <div class="box box-solid bg-fuchsia">
                        <div class="box-header">
                            <i class="fa fa-qrcode"></i>

                            <h3 class="box-title">BifrostV 配置二维码&地址</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="text-center">
                                <div id="bfv-qr"></div>
                            </div>
                            <div class="input-group">
                                <input type="text" id="bfv-qr-text" class="form-control" value="{$bfvqr}">
                                <div class="input-group-btn">
                                    <a class="btn btn-primary btn-flat" href="{$bfvqr}">></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col (right) -->

                <div class="col-lg-3">
                    <div class="box box-solid bg-fuchsia">
                        <div class="box-header">
                            <i class="fa fa-qrcode"></i>

                            <h3 class="box-title">v2rayNG 配置二维码&地址</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="text-center">
                                <div id="ng-qr"></div>
                            </div>
                            <div class="input-group">
                                <input type="text" id="ng-qr-text" class="form-control" value="{$ngqr}">
                                <div class="input-group-btn">
                                    <a class="btn btn-primary btn-flat" href="{$ngqr}">></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col (right) -->
            </div>
        {/if}
        {if $ss}
            <div class="row hide">
                <div class="col-md-12">
                    <div class="box box-solid">
                        <div class="box-header">
                            <i class="fa fa-qrcode"></i>

                            <h3 class="box-title">Surge配置</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Surge使用步骤</h4>

                                    <p>基础配置只需要做一次：
                                    <ol>
                                        <li>打开 Surge ，点击右上角“Edit”，点击“Download Configuration from URL”</li>
                                        <li>输入基础配置的地址（或扫描二维码得到地址，复制后粘贴进来），点击“OK”</li>
                                        <li><b>注意：</b>基础配置不要改名，不可以直接启用。</li>
                                    </ol>
                                    </p>
                                    <p>代理配置需要根据不同的节点进行添加：
                                    <ol>
                                        <li>点击“New Empty Configuration”</li>
                                        <li>在“NAME”里面输入一个配置文件的名称</li>
                                        <li>点击下方“Edit in Text Mode”</li>
                                        <li>输入代理配置的全部文字（或扫描二维码得到配置，复制后粘贴进来），点击“OK”</li>
                                        <li>直接启用代理配置即可科学上网。</li>
                                    </ol>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h4>基础配置</h4>

                                    <div class="text-center">
                                        <div id="surge-base-qr"></div>
                                    </div>
                                    <textarea id="surge-base-text" class="form-control"
                                              rows="6">{$surge_base}</textarea>
                                </div>
                                <div class="col-md-4">
                                    <h4>代理配置</h4>

                                    <div class="text-center">
                                        <div id="surge-proxy-qr"></div>
                                    </div>
                                    <textarea id="surge-proxy-text" class="form-control"
                                              rows="6">{$surge_proxy}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        {/if}
        <!-- END PROGRESS BARS -->
        <script src=" /assets/public/js/jquery.qrcode.min.js "></script>
        <script>
          var text_qrcode = jQuery('#ss-qr-text').val();
          jQuery('#ss-qr').qrcode({
            "text": text_qrcode
          });
          var text_rqrcode = jQuery('#ssr-qr-text').val();
          jQuery('#ssr-qr').qrcode({
            "text": text_rqrcode
          });
          var text_rdqrcode = jQuery('#ssrd-qr-text').val();
          jQuery('#ssrd-qr').qrcode({
            "text": text_rdqrcode
          });
          var text_ngqrcode = jQuery('#ng-qr-text').val();
          jQuery('#ng-qr').qrcode({
            "text": text_ngqrcode
          });
          var text_bfvqrcode = jQuery('#bfv-qr-text').val();
          jQuery('#bfv-qr').qrcode({
            "text": text_bfvqrcode
          });
          var text_surge_base = jQuery('#surge-base-text').val();
          jQuery('#surge-base-qr').qrcode({
            "text": text_surge_base
          });
          var text_surge_proxy = jQuery('#surge-proxy-text').text();
          jQuery('#surge-proxy-qr').qrcode({
            "text": text_surge_proxy
          });
        </script>
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->
{include file='user/footer.tpl'}
