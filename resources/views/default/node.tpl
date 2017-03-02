{include file='header.tpl'}
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <div class="row center">
            <h3>节点列表</h3>
        </div>
    </div>
</div>

<div class="container">
    <div class="section">
        <!--   Icon Section   -->
        <div class="row">
            <div class="row marketing">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>节点名称</th>
                            <th>节点介绍</th>
                            <th>服务器负载</th>
                            <th>流量比例</th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach $nodes as $node}
                            <tr>
                                <td>{$node->name}</td>
                                <td>{$node->info}</td>
                                <td>{$node->getNodeLoad()}</td>
                                <td>{$node->traffic_rate}</td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
{include file='footer.tpl'}