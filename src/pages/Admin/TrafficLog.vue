<template>

    <div class="content-padder content-background">
        <div class="uk-section-small uk-section-default header">
            <div class="uk-container uk-container-large">
                <h3><span class="ion-speedometer"></span> {{ $t("user-nav.traffic-log") }} </h3>
            </div>
        </div>
        <div class="uk-section-small">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-1@m uk-child-width-1-1@xl">
                    <div class="uk-card uk-card-default uk-card-body">
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
                                <td>{{ bytesToSize(log.u + log.d) }}</td>
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
    import admin from '../../http/admin'
    import pagination from 'laravel-vue-pagination-uikit'
    import {bytesToSize} from '../../tools/util'
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

                admin.get(`trafficLogs?page=` + page)
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
            bytesToSize,
        },
        mounted: function () {
            this.Results();
        },
    }
</script>