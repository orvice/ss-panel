<template>

    <div class="content-padder content-background">
        <div class="uk-section-small uk-section-default header">
            <div class="uk-container uk-container-large">
                <h3><span class="ion-speedometer"></span> {{ $t("base.setting") }} </h3>
            </div>
        </div>
        <div class="uk-section-small">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-3@xl">
                    <div class="uk-card uk-card-default uk-card-body">

                        <span class="statistics-text">{{$t("user-index.connection-info")}}</span><br/>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">{{$t("ss.password")}}</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="password">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-select">{{$t("ss.method")}}</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" id="form-horizontal-select" v-model="ssMethod" >
                                    <option v-for="m in methods" :value="m">{{m}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-select">{{$t("ss.obfs-protocol")}}</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" id="form-horizontal-select" v-model="ssProtocol">
                                    <option v-for="m in protocol" :value="m">{{m}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-select">{{$t("ss.obfs-plugin")}}</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" id="form-horizontal-select" v-model="ssObfs">
                                    <option v-for="m in obfs" :value="m" >{{m}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <button class="uk-button uk-button-primary" @click="update">
                                {{$t("base.update")}}
                            </button>
                        </div>

                    </div>


                    <div class="uk-card uk-card-default uk-card-body">

                        <span class="statistics-text">{{$t("auth.update-password")}}</span><br/>

                        <div class="uk-margin">
                            <label class="uk-form-label"
                                   for="form-horizontal-text">{{$t("auth.current-password")}}</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="currentPassword">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">{{$t("auth.new-password")}}</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="newPassword">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label"
                                   for="form-horizontal-text">{{$t("auth.password-repeat")}}</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="newPasswordRepeat">
                            </div>
                        </div>


                        <div class="uk-margin">
                            <button class="uk-button uk-button-primary" @click="updatePassword">
                                {{$t("auth.update-password")}}
                            </button>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>


</template>

<script>
    import rest from '../http/rest'
    import http from '../http/base'
    import * as code from '../code/auth'
    export default {
        name: 'Setting',
        components: {},
        data () {
            return {
                data: {},
                methods: {},
                protocol: {},
                obfs: {},

                // SS From
                password: this.$store.state.user.data.passwd,
                ssProtocol: '',
                ssMethod: '',
                ssObfs: '',

                // Password From
                currentPassword: '',
                newPassword: '',
                newPasswordRepeat: '',
            }
        },
        methods: {
            initData(){
                http.get('config/ss')
                    .then(response => {
                        const data = response.data.data;
                        this.methods = data.methods;
                        this.protocol = data.protocol;
                        this.obfs = data.obfs;
                    })
                    .catch(e => {
                        this.errors.push(e)
                    })
            },
            update(){
                // @todo
                console.log("update");
                rest.put('', {
                    passwd: this.password,
                    method: this.ssMethod,
                    protocol: this.ssProtocol,
                    obfs: this.ssObfs,
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
            },
            updatePassword(){
                // @todo
                rest.put('password', {
                    current_password: this.currentPassword,
                    new_password: this.newPassword,
                    new_password_repeat: this.newPasswordRepeat,
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
                        let msg = '';
                        switch (e.response.data.error_code) {
                            case code.CurrentPasswordWrong:
                                msg = this.$t('auth.current-password-wrong');
                                break;
                            case code.NewPasswordRepeatWrong:
                                msg = this.$t('auth.password-repeat-wrong');
                                break;
                            default:
                                msg = this.$t('base.system-error');
                                break;
                        }
                        UIkit.notification({
                            message: msg,
                            status: 'danger',
                            pos: 'top-center',
                            timeout: 5000
                        });

                    });
                console.log("update password");
            },
        },
        mounted: function () {
            this.initData();
        },
    }
</script>