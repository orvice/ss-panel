<template>

    <div class="content-padder content-background">
        <div class="uk-section-small uk-section-default header">
            <div class="uk-container uk-container-large">
                <h3><span class="ion-speedometer"></span> {{ $t("admin-nav.mail-setting") }} </h3>
            </div>
        </div>
        <div class="uk-section-small">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-4@xl">
                    <div class="uk-card uk-card-default uk-card-body">

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text"> {{$t("admin.mailgun-key")}} </label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="mailgunKey">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">{{$t("admin.mailgun-domain")}}</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="mailgunDomain">
                            </div>
                        </div>




                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">{{$t("admin.mailgun-sender")}}</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="mailgunSender">
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
                mailgunDomain: '',
                mailgunKey: '',
                mailgunSender: '',

            }
        },
        methods: {
            getCfgs(){
                admin.get('config')
                    .then(response => {
                        this.cfgs = response.data.data;
                        this.mailgunDomain = this.cfgs.mailgunDomain;
                        this.mailgunKey = this.cfgs.mailgunKey;
                        this.mailgunSender = this.cfgs.mailgunSender;
                    })
                    .catch(e => {
                    })
            },
            update(){
                admin.put('config', {
                    mailgunKey: this.mailgunKey,
                    mailgunDomain: this.mailgunDomain,
                    mailgunSender: this.mailgunSender,
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