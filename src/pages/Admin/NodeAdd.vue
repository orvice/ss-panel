<template>

    <div class="content-padder content-background">
        <div class="uk-section-small uk-section-default header">
            <div class="uk-container uk-container-large">
                <h3><span class="ion-speedometer"></span> {{$t("ss.node")}} </h3>
            </div>
        </div>
        <div class="uk-section-small">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-1@m uk-child-width-1-4@xl">
                    <div class="uk-card uk-card-default uk-card-body">

                        <div class="uk-margin">
                            <label class="uk-form-label"
                                   for="form-horizontal-text">{{$t("ss.node_name")}}</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="name">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label"
                                   for="form-horizontal-text">{{$t("ss.server_addr")}}</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="server">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label"
                                   for="form-horizontal-text">{{$t("ss.node_info")}}</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="info">
                            </div>
                        </div>


                        <div class="uk-margin">
                            <button class="uk-button uk-button-primary" @click="add">
                                {{$t("admin.add")}}
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
    import admin from '../../http/admin'
    import pagination from 'laravel-vue-pagination-uikit'
    import {bytesToSize} from '../../tools/util'
    export default {
        name: 'NodeAdd',
        components: {
            pagination,
        },
        data () {
            return {
                data: {},
                name: '',
                server: '',
                info: '',
                type: 1,
                status: 1,
                offset: 1,
                sort: 0,
            }
        },
        methods: {
            add(){
                admin.post('nodes', {
                    name: this.name,
                    server: this.server,
                    info: this.info,
                    type: this.type,
                    status: this.status,
                    offset: this.offset,
                    sort: this.sort,
                })
                    .then(response => {
                        UIkit.notification({
                            message: this.$t('base.success'),
                            status: 'primary',
                            pos: 'top-center',
                            timeout: 5000
                        });
                        window.location.href = '/admin/nodes';
                        // this.$router.push({name: "node-add"});
                    })
                    .catch(e => {
                        UIkit.notification({
                            message: this.$t('base.something-wrong'),
                            status: 'danger',
                            pos: 'top-center',
                            timeout: 5000
                        });
                    })
            }
        },
        mounted: function () {
        },
    }
</script>