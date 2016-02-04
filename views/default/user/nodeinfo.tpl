<div id="node" class="row">
    <div class="col-md-6">
        <pre>{$json}</pre>
        <button id="node_json" class="btn btn-primary btn-block btn-flat" type="button">查看二维码</button>
    </div>
    <div class="col-md-6">
        <div>
            <div align="center">
                <div id="qrcode"></div>
            </div>
        </div>
    </div>
    <div style="text-align:center">
        <p>{$ssqr}</p>
    </div>
    <script src=" /assets/public/js/jquery.qrcode.min.js "></script>
    <script>jQuery('#qrcode').qrcode("{$ssqr}");</script>
</div>