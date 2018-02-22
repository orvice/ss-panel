<template>

    <div class="content-padder content-background">
        <div class="uk-section-small uk-section-default header">
            <div class="uk-container uk-container-large">
                <h3><span class="ion-speedometer"></span> {{$t("nav.invite-code")}} </h3>
            </div>
        </div>
        <div class="uk-section-small">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-1@m uk-child-width-1-1@xl">
                    <div class="uk-card uk-card-default uk-card-body">
                        <div class="uk-margin">
                            <router-link tag="li" :to="{ name: 'invite-add' }" exact>
                                <button class="uk-button uk-button-primary">
                                    {{$t("admin.add")}}
                                </button>
                            </router-link>
                        </div>

                        <table class="uk-table uk-table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{$t("nav.invite-code")}}</th>
                                <th>{{$t("admin.action")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="c in data.data">
                                <td>#{{c.id}}</td>
                                <td>{{c.code}}</td>
                                <td> <div class="uk-margin">
                                    <button class="uk-button uk-button-danger" @click="deleteCode(c.id)">
                                        {{$t("admin.delete")}}
                                    </button>
                                </div></td>
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
    import admin from '../../http/admin'
    import pagination from 'laravel-vue-pagination-uikit'
    import {bytesToSize,notify} from '../../tools/util'
    export default {
        name: 'Node',
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

                admin.get(`invites?page=` + page)
                    .then(response => {
                        this.data = response.data;
                        this.logs = response.data.data;
                    })
                    .catch(e => {
                    })
            },
            timeFormat(ut){
                return new Date(ut * 1e3).toISOString();
            },
            deleteCode(id){
                admin.delete(`invites/` + id)
                    .then(response => {
                        notify(this.$t('base.success'),'primary');
                        this.Results();
                    })
                    .catch(e => {
                        notify(this.$t('base.something-wrong'),'danger');
                    })
            },
            bytesToSize,
        },
        mounted: function () {
            this.Results();
        },
    }
</script>