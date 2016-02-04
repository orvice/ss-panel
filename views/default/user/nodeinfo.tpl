<div id="node" class="row">
    <div class="col-md-6">
        <pre>{$json}</pre>
        <div style="word-break:break-all word-wrap:break-word">
            <b>{$ssqr}</b>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <div align="center">
                <div id="qrcode"></div>
            </div>
        </div>
    </div>
    <script src=" /assets/public/js/jquery.qrcode.min.js "></script>
    <script>jQuery('#qrcode').qrcode("{$ssqr}");</script>
</div>