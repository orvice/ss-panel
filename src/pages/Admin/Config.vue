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
                            <label class="uk-form-label" for="form-horizontal-text">{{$t("base.app-uri")}}</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="appUri">
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
                            <label class="uk-form-label"
                                   for="form-horizontal-text">{{$t("base.checkInTime")}} ({{$t("base.hour")}} )</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="checkInTime">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label"
                                   for="form-horizontal-text">{{$t("base.default-traffic")}} (GB)</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="defaultTraffic">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label"
                                   for="form-horizontal-text">{{$t("base.default-invite-num")}}</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="defaultInviteNum">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">{{$t("base.mu-key")}}</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="muKey">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">{{$t("admin.home-message")}}</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="homeMessage">
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
                appUri: '',
                checkInMin: '',
                checkInMax: '',
                checkInTime: '',

                defaultTraffic: '',
                defaultInviteNum: '',
                muKey: '',

                homeMessage: '',
            }
        },
        methods: {
            getCfgs(){
                admin.get('config')
                    .then(response => {
                        this.cfgs = response.data.data;
                        this.appName = this.cfgs.appName;
                        this.appUri = this.cfgs.appUri,
                        this.checkInMin = this.cfgs.checkInMin;
                        this.checkInMax = this.cfgs.checkInMax;
                        this.checkInTime = this.cfgs.checkInTime;
                        this.defaultTraffic = this.cfgs.defaultTraffic;
                        this.defaultInviteNum = this.cfgs.defaultInviteNum;
                        this.muKey = this.cfgs.muKey;
                        this.homeMessage = this.cfgs.homeMessage;
                    })
                    .catch(e => {
                    })
            },
            update(){
                admin.put('config', {
                    appName: this.appName,
                    appUri: this.appUri,
                    checkInMin: this.checkInMin,
                    checkInMax: this.checkInMax,
                    checkInTime: this.checkInTime,
                    defaultTraffic: this.defaultTraffic,
                    defaultInviteNum: this.defaultInviteNum,
                    muKey: this.muKey,
                    homeMessage: this.homeMessage,
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