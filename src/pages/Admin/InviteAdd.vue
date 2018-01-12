<template>

    <div class="content-padder content-background">
        <div class="uk-section-small uk-section-default header">
            <div class="uk-container uk-container-large">
                <h3><span class="ion-speedometer"></span> {{$t("ss.node")}} </h3>
            </div>
        </div>
        <div class="uk-section-small">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-1@m uk-child-width-1-1@xl">
                    <div class="uk-card uk-card-default uk-card-body">


                        <div class="uk-margin">
                            <label class="uk-form-label"
                                   for="form-horizontal-text">{{$t("admin.num")}}</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="num">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label"
                                   for="form-horizontal-text">{{$t("admin.prefix")}}</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="prefix">
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
    import {bytesToSize,notify} from '../../tools/util'
    export default {
        name: 'NodeAdd',
        components: {
            pagination,
        },
        data () {
            return {
                data: {},
                num: '',
                prefix: '',
                uid: 0,
            }
        },
        methods: {
            add(){
                admin.post('invites', {
                    num: this.num,
                    prefix: this.prefix,
                    uid: this.uid,
                })
                    .then(response => {
                        notify(this.$t('base.success'),'primary');
                        window.location.href = '/admin/invites';
                        // this.$router.push({name: "node-add"});
                    })
                    .catch(e => {
                        notify(this.$t('base.something-wrong'),'danger');
                    })
            }
        },
        mounted: function () {
        },
    }
</script>