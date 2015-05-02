<div class="footer">
    <p>&copy; <?php echo $site_name."  ".date('Y'); ?>  Powered by <a href="https://github.com/orvice/ss-panel">ss-panel</a> <?php echo $version; ?>
        耗时：<?php
        $Runtime->Stop();
        echo $Runtime->SpendTime()."ms";
        ?>
    </p>
</div>
