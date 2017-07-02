<template>

    <div class="content-padder content-background">
        <div class="uk-section-small uk-section-default header">
            <div class="uk-container uk-container-large">
                <h3><span class="ion-speedometer"></span> {{ $t("admin-nav.config") }} </h3>
            </div>
        </div>
        <div class="uk-section-small">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-4@xl">
                    <div class="uk-card uk-card-default uk-card-body">

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">{{$t("base.app-name")}}</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="appName">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">{{$t("base.checkInMin")}}</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="checkInMin">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">{{$t("base.checkInMax")}}</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="checkInMax">
                            </div>
                        </div>


                        <div class="uk-margin">
                            <button class="uk-button uk-button-primary" @click="update">
                                {{$t("base.update")}}
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>


</template>

<script>
    import rest from '../../http/rest'
    import admin from '../../http/admin'
    export default {
        name: 'Config',
        components: {},
        data () {
            return {
                cfgs: {},
                appName: '',
                checkInMin: '',
                checkInMax: '',
            }
        },
        methods: {
            getCfgs(){
                admin.get('config')
                    .then(response => {
                        this.cfgs = response.data.data;
                        this.appName = this.cfgs.appName;
                        this.checkInMin = this.cfgs.checkInMin;
                        this.checkInMax = this.cfgs.checkInMax;
                    })
                    .catch(e => {
                    })
            },
            update(){
                admin.put('config', {
                    appName: this.appName,
                    checkInMin: this.checkInMin,
                    checkInMax: this.checkInMax,
                })
                    .then(response => {
                        UIkit.notification({
                            message: this.$t('base.success'),
                            status: 'primary',
                            pos: 'top-center',
                            timeout: 5000
                        });
                    })
                    .catch(e => {
                        UIkit.notification({
                            message: this.$t('base.something-wrong'),
                            status: 'danger',
                            pos: 'top-center',
                            timeout: 5000
                        });
                    });
                console.log("update config");
            },
        },
        mounted: function () {
            this.getCfgs();
        },
    }
</script>