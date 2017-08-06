{include file='ping/main.tpl'}
{literal}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            测试状态
            <small>Test Status</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content" id="app">
        <div class="table-responsive" style="padding-top: 20px">
            <table class="table table-hover">
                <tr>
                    <th>运行 ID</th>
                    <th>节点地址</th>
                    <th>端口</th>
                    <th>测试结果</th>
                    <th>运行 Host</th>
                </tr>
                <tr v-for="job in jobs">
                    <td>{{ job.id }}</td>
                    <td>{{ job.node_addr }}</td>
                    <td>{{ job.port }}</td>
                    <td>
                        <a v-if="job.status === 'Queuing'" data-toggle="modal" v-bind:data-target="'#Modal' + job.id" class="btn btn-info">Queuing</a>
                        <a v-else-if="job.status === 'Starting'" data-toggle="modal" v-bind:data-target="'#Modal' + job.id" class="btn btn-warning">Starting</a>
                        <a v-else-if="job.status === 'Running'" data-toggle="modal" v-bind:data-target="'#Modal' + job.id" class="btn btn-warning">Running</a>
                        <a v-else-if="job.status === 'Pending'" data-toggle="modal" v-bind:data-target="'#Modal' + job.id" class="btn btn-warning">Pending</a>
                        <a v-else-if="job.status === 'Passing'" data-toggle="modal" v-bind:data-target="'#Modal' + job.id" class="btn btn-success">Passing</a>
                        <a v-else-if="job.status === 'Failing'" data-toggle="modal" v-bind:data-target="'#Modal' + job.id" class="btn btn-danger">Failing</a>
                        <a v-else data-toggle="modal" v-bind:data-target="'#Modal' + job.id" class="btn btn-default">Undefined</a>
                    </td>
                    <td>
                        <button v-if="job.run_host" class="btn btn-danger">{{ job.run_host }}</button>
                        <p v-else>未指定</p>
                    </td>
                </tr>
            </table>
        </div>
        <!-- /.row --><!-- END PROGRESS BARS -->
        <div v-for="job in jobs" class="modal fade" v-bind:id="'Modal' + job.id"  tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">{{ '运行 ID： ' + job.id }}</h4>
                    </div>
                    <div class="modal-body">
                        <div style="margin-bottom: 10px">
                            <a v-if="job.status === 'Queuing'" data-toggle="modal" v-bind:data-target="'#Modal' + job.id" class="btn btn-info">Queuing</a>
                            <a v-else-if="job.status === 'Starting'" data-toggle="modal" v-bind:data-target="'#Modal' + job.id" class="btn btn-warning">Starting</a>
                            <a v-else-if="job.status === 'Running'" data-toggle="modal" v-bind:data-target="'#Modal' + job.id" class="btn btn-warning">Running</a>
                            <a v-else-if="job.status === 'Pending'" data-toggle="modal" v-bind:data-target="'#Modal' + job.id" class="btn btn-warning">Pending</a>
                            <a v-else-if="job.status === 'Passing'" data-toggle="modal" v-bind:data-target="'#Modal' + job.id" class="btn btn-success">Passing</a>
                            <a v-else-if="job.status === 'Failing'" data-toggle="modal" v-bind:data-target="'#Modal' + job.id" class="btn btn-danger">Failing</a>
                            <a v-else data-toggle="modal" v-bind:data-target="'#Modal' + job.id" class="btn btn-default">Undefined</a>
                            <button v-if="job.run_host" class="btn btn-danger">{{ job.run_host }}</button>
                        </div>
                        <pre style="word-wrap: break-word; white-space: pre-wrap; white-space: -moz-pre-wrap">
                            {{ job.log }}
                        </pre>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </section>

    <!-- /.content -->
</div><!-- /.content-wrapper -->

<script src="https://unpkg.com/vue"></script>

<script>
    var app = new Vue({
        el: '#app',
        data: function () {
            return {
                jobs: []
            }
        },
        methods: {
            startLoop: function () {
                var vm = this;
                vm.refresh();
                vm.timer = window.setInterval(function() {
                    vm.refresh();
                }, 1500);
            },
            refresh: function () {
                var vm = this;
                $.ajax({
                    url: "/ping/status",
                    method: "POST",
                    success: function (msg) {
                        var dataObj = eval("(" + msg + ")");
                        if(dataObj.result) {
                            vm.jobs = dataObj.jobs.data;
                        }
                    }
                });
            }
        }
    });

    $(function () {
        app.startLoop();
    });
</script>
{/literal}
{include file='ping/footer.tpl'}