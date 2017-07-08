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

                    <h4 class="title title-up">{{$t("auth.forgot-password")}}</h4>

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

                    <div class="alert alert-primary" role="alert" v-if="isSuccess">
                        <div class="container">
                            <div class="alert-icon">
                                <i class="now-ui-icons objects_support-17"></i>
                            </div>
                            {{successMsg}}
                        </div>
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
                    <a href="#pablo" @click="reset"
                       class="btn btn-neutral btn-round btn-lg">{{$t("auth.reset-password")}}</a>
                </div>

            </div>
        </div>
    </div>

</template>

<script>
    import http from '../http/base'
    import * as types from '../store/types'
    import * as code from '../code/auth'
    export default {
        name: 'PasswordReset',
        components: {},
        data () {
            return {
                isError: false,
                isSuccess: false,
                errorMsg: '',
                successMsg: '',
                email: '',
                password: '',
                token:  this.inviteCode = this.$route.params.token,
                message: '',
            }
        },
        methods: {
            reset() {
                console.log("start reset password");
                http.post("password/"+this.token, {
                    email: this.email,
                    password: this.password,
                })
                    .then(response => {
                        console.log("success");
                        this.isError = false;
                        this.isSuccess = true;
                        this.successMsg = this.$t("base.success");
                    })
                    .catch(e => {
                        console.log("error");
                        this.isError = true;
                        if (e.response) {
                            console.log(e.response.status);
                        }
                        switch (e.response.data.error_code) {
                            case code.LinkExpired:
                                return this.errorMsg = this.$t('auth.link-expired');
                            default:
                                this.errorMsg = this.$t('base.system-error');
                                break;
                        }
                        return this.errorMsg = this.$t('base.system-error');
                    })
            }
        }
    }
</script>
