<template>

    <div>
        <div ref="container">
            <div class="uk-width-auto">
                <div class="uk-container">
                    <div class="uk-overflow-auto">
                        <h1 class="uk-table uk-table-divider">
                            {{ $t("user-nav.traffic-log") }}
                        </h1>

                        <table class="uk-table uk-table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{$t("ss.node")}}</th>
                                <th>{{$t("ss.traffic_rate")}}</th>
                                <th>Traffic</th>
                                <th>time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="log in data.data">
                                <td>#{{log.id}}</td>
                                <td>{{log.name}}</td>
                                <td>{{log.rate}}</td>
                                <td>{{ bytesToSize(log.u+log.d) }}</td>
                                <td>{{ timeFormat(log.log_time) }}</td>
                            </tr>
                            </tbody>
                        </table>

                        <pagination :data="data" v-on:pagination-change-page="Results"></pagination>


                    </div>
                </div>
            </div>

        </div>
    </div>

</template>

<script>
    import axios from 'axios'
    import rest from '../http/rest'
    import pagination from 'laravel-vue-pagination-uikit'
    export default {
        name: 'TrafficLog',
        components: {
            pagination,
        },
        data () {
            return {
                data: {},
            }
        },
        methods: {
            Results(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }

                rest.get(`trafficLogs?page=` + page)
                    .then(response => {
                        this.data = response.data;
                        this.logs = response.data.data;
                    })
                    .catch(e => {
                        this.errors.push(e)
                    })
            },
            timeFormat(ut){
                return new Date(ut * 1e3).toISOString();
            },
            bytesToSize(bytes) {
                if (bytes === 0) return '0 B';
                const k = 1000, // or 1024
                    sizes = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
                    i = Math.floor(Math.log(bytes) / Math.log(k));
                return (bytes / Math.pow(k, i)).toPrecision(3) + ' ' + sizes[i];
            }
        },
        mounted: function () {
            this.Results();
        },
    }
</script>