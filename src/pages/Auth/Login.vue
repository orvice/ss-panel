<template>
    <div class="container">
        <div class="content-center">
            <div class="card card-signup  card-plain">
                <div class="header header-primary text-center">

                    <div class="header header-primary text-center" v-if="false">
                        <div class="logo-container">
                            <img class="n-logo" src="/assets/img/logo.png" alt="" width="30%">
                        </div>
                    </div>

                    <h4 class="title title-up">{{$t("auth.login")}}</h4>
                    <div class="social-line" v-if="false">
                        <a href="#pablo" class="btn btn-neutral btn-facebook btn-icon btn-icon-mini">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                        <a href="#pablo" class="btn btn-neutral btn-twitter btn-icon">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#pablo" class="btn btn-neutral btn-google btn-icon  btn-icon-mini">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="content">

                    <div class="alert alert-danger" role="alert" v-if="isError">
                        <div class="container">
                            <div class="alert-icon">
                                <i class="now-ui-icons objects_support-17"></i>
                            </div>
                            {{errorMsg}}
                        </div>
                    </div>

                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons ui-1_email-85"></i>
                                        </span>
                        <input type="text" class="form-control" :placeholder="$t('auth.email')" v-model="email">
                    </div>
                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                        </span>
                        <input type="password" :placeholder="$t('auth.password')" class="form-control"
                               v-model="password"/>
                    </div>

                </div>
                <div class="footer text-center">
                    <a href="#pablo" @click="login" class="btn btn-primary btn-lg btn-round">{{$t("auth.login")}}</a>
                </div>
                <div class="pull-right">
                    <router-link :to="{ name: 'password-reset' }" exact>
                        <h6>
                            <a class="link">{{ $t("auth.forgot-password") }}</a>
                        </h6>
                    </router-link>
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
                        window.location.href = '/dashboard';
                    })
                    .catch(e => {
                        console.log("error");
                        this.isError = true;
                        if (e.response) {
                            console.log(e.response.status);
                        }
                        switch (e.response.data.error_code) {
                            case code.UserNotExists:
                                this.errorMsg = this.$t('auth.login-fail');
                                break;
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
