{include file='ping/main.tpl'}
{literal}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            测试状态
            <small>New Test</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content" id="app">
        <div class="table-responsive" style="padding-top: 20px">
            <table class="table table-hover">
                <tr>
                    <th>Run ID</th>
                    <th>Node Addr</th>
                    <th>Port</th>
                    <th>Status</th>
                </tr>
                <tr v-for="job in jobs">
                    <td>{{ job.id }}</td>
                    <td>{{ job.node_addr }}</td>
                    <td>{{ job.port }}</td>
                    <td>
                        <a v-if="job.status === 'Queuing'" v-bind:href="'/status/' + job.id" class="btn btn-info">Queuing</a>
                        <a v-else-if="job.status === 'Starting'" v-bind:href="'/status/' + job.id" class="btn btn-warning">Starting</a>
                        <a v-else-if="job.status === 'Running'" v-bind:href="'/status/' + job.id" class="btn btn-warning">Running</a>
                        <a v-else-if="job.status === 'Pending'" v-bind:href="'/status/' + job.id" class="btn btn-warning">Pending</a>
                       <a v-else-if="job.status === 'Passing'" v-bind:href="'/status/' + job.id" class="btn btn-success">Passing</a>
                        <a v-else-if="job.status === 'Failing'" v-bind:href="'/status/' + job.id" class="btn btn-danger">Failing</a>
                       <a v-else v-bind:href="'/status/' + job.id" class="btn btn-default">Undefined</a>
                    </td>
                </tr>
            </table>
        </div>
        <!-- /.row --><!-- END PROGRESS BARS -->
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
                }, 5000);
            },
            refresh: function () {
                var vm = this;
                $.ajax({
                    url: "/ping/status/proxy",
                    method: "GET",
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