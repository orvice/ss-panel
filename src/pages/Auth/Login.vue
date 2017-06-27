<template>

<div class="content-padder content-background">
        <div class="uk-section-small uk-section-default header">
            <div class="uk-container uk-container-large">
                <h1><span class="ion-speedometer"></span> {{$t('auth.login')}} </h1>
            </div>
        </div>
        <div class="uk-section-small">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-4@xl">
                      <form>

                            <div class="uk-margin" v-if="isError">
                                <div class="uk-inline">
                                    <div class="uk-alert-danger" uk-alert>
                                        <a class="uk-alert-close" uk-close></a>
                                        <p>{{errorMsg}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                                    <input class="uk-input" type="text" v-model="email">
                                </div>
                            </div>

                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                    <input class="uk-input" type="password" v-model="password">
                                </div>
                            </div>

                        </form>

                        <div class="uk-margin">
                            <div class="uk-inline">
                                <p uk-margin>
                                    <button class="uk-button uk-button-primary" @click="login">{{$t('auth.login')}}
                                    </button>
                                </p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>


    

</template>

<script>
    import http from '../../http/base'
    import * as types from '../../store/types'
    import * as code from '../../code/auth'
    export default {
        name: 'Login',
        components: {},
        data () {
            return {
                isError: false,
                errorMsg: '',
                email: '',
                password: '',
                message: '',
            }
        },
        methods: {
            login() {
                console.log("start login");
                http.post("token", {
                    email: this.email,
                    password: this.password,
                })
                    .then(response => {
                        console.log("success");
                        // Save token in cookie
                        let token = response.data.data.token;
                        let id = response.data.data.user_id;
                        let user = {
                            token: token,
                            id: id,
                        };
                        this.$store.commit(types.Login, user);
                        this.$cookie.set('Token', token, 1);
                        this.$router.push({name:"dashboard"});
                    })
                    .catch(e => {
                        console.log("error");
                        this.isError = true;
                        if (e.response) {
                            console.log(e.response.status);
                        }
                        switch (e.response.data.error_code) {
                            case code.PasswordWrong:
                                this.errorMsg = this.$t('auth.login-fail');
                                break;
                            default:
                                this.errorMsg = this.$t('base.system-error');
                                break;
                        }
                    })
            }
        }
    }
</script>