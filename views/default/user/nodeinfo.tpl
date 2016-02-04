<div id="node" class="row">
    <div class="col-md-6">
        <pre>{$json}</pre>
    </div>
    <div class="col-md-6">
        <div>
            <div align="center">
                <div id="qrcode"></div>
            </div>
        </div>
    </div>
    <div style="text-align:center ">
        <b>{$ssqr}</b>
    </div>
    <script src=" /assets/public/js/jquery.qrcode.min.js "></script>
    <script>jQuery('#qrcode').qrcode("{$ssqr}");</script>
</div>