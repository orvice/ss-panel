<?php
require_once 'lib/config.php';
include_once 'header.php';
$c = new \Ss\User\Invite();
?>

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <div class="row center">
            <h5  > 邀请码实时刷新</h5>
            <h5>如遇到无邀请码请找已经注册的用户获取。</h5>
        </div>
    </div>
</div>


<div class="container">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="row marketing">
                <h2 class="sub-header">邀请码</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>###</th>
                            <th>邀请码</th>
                            <th>状态</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $datas = $c->CodeArray();
                        $a = 0;
                        foreach($datas as $data ){
                            ?>
                            <tr>
                                <td><?php echo $a;$a++; ?></td>
                                <td><?php echo $data['code'];?></td>
                                <td>可用</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br><br>

    <div class="section">

    </div>
</div>
<?php  include_once 'ana.php';
include_once 'footer.php';?>
