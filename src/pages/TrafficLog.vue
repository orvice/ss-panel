<template>

    <div>
        <div ref="container">
            <div class="uk-width-1-1">
                <div class="uk-container">
                    <div class="uk-overflow-auto">
                        <h1 class="uk-table uk-table-divider">
                            {{ $t("user-nav.traffic-log") }}
                        </h1>

                        <table class="uk-table uk-table-striped">
                            <thead>
                            <tr>
                                <th>Table Heading</th>
                                <th>Table Heading</th>
                                <th>Table Heading</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="log in data.data">
                                <td>#{{log.id}}</td>
                                <td>{{log.node_id}}</td>
                                <td>Table Data</td>
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
            }
        },
        mounted: function () {
            this.Results();
        },
    }
</script>