<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/<?php echo BD_PATH; ?>index.php"> <?php echo $site_name; ?> </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">

                <?php
                //已经登录
                if(!empty($_COOKIE[user_name])) {    ?>
                <li><a href="#">用户：<?php echo $_COOKIE[user_name];?> </a></li>
                <li><a href="../logout.php?action=logout">退出</a></li>
                <?php } ?>




            </ul>
        </div>
    </div>
</div>