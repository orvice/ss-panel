<template>
<div class="container">
    <div class="content-center">
        <div class="card card-signup card-plain">
            <div class="header header-primary text-center">
                <h6 class="title title-up">{{$t("auth.register-be-a-cat")}}</h6>
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
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </span>
                        </button>
                    </div>
                </div>
                <div class="input-group form-group-no-border">
                    <span class="input-group-addon">
                        <i class="now-ui-icons users_circle-08"></i>
                    </span>
                    <input type="text" class="form-control" :placeholder="$t('auth.username')" v-model="userName">
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
                <div class="input-group form-group-no-border">
                    <span class="input-group-addon">
                        <i class="now-ui-icons ui-1_lock-circle-open"></i>
                    </span>
                    <input type="password" :placeholder="$t('auth.password-repeat')" class="form-control"
                    v-model="passwordRepeat"/>
                </div>
                <div class="input-group form-group-no-border">
                    <span class="input-group-addon">
                        <i class="now-ui-icons ui-1_lock-circle-open"></i>
                    </span>
                    <input type="text" :placeholder="$t('nav.invite-code')" class="form-control"
                    v-model="inviteCode"/>
                </div>
                <!-- If you want to add a checkbox to this form, uncomment this code -->
                <!-- <div class="checkbox">
                    <input id="checkboxSignup" type="checkbox">
                    <label for="checkboxSignup">
                        Unchecked
                    </label>
                </div> -->
            </div>
            <div class="footer text-center">
                <a href="#pablo" class="btn btn-primary btn-lg btn-round"
                @click="register">{{$t("auth.create-account")}}</a>
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
        name: 'Register',
        components: {},
        data () {
            return {
                isError: false,
                errorMsg: '',

                userName: '',
                email: '',
                password: '',
                passwordRepeat: '',
                inviteCode: '',

                message: '',
            }
        },
        methods: {
            register() {
                console.log("start register");
                http.post("createUser", {
                    userName: this.userName,
                    email: this.email,
                    password: this.password,
                    passwordRepeat: this.passwordRepeat,
                    inviteCode: this.inviteCode,
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
                        //this.$router.push({name: "dashboard"});
                    })
                    .catch(e => {
                        console.log("error");
                        this.isError = true;
                        if (e.response) {
                            console.log(e.response.status);
                        }
                        switch (e.response.data.error_code) {
                            case code.InviteCodeWrong :
                                this.errorMsg = this.$t('auth.invite-code-invalid');
                                break;
                            case code.EmailWrong :
                                this.errorMsg = this.$t('auth.email-invalid');
                                break;
                            case code.PasswordTooShort :
                                this.errorMsg = this.$t('auth.password-too-short');
                                break;
                            case code.EmailUsed:
                                this.errorMsg = this.$t('auth.email-used');
                                break;
                            case code.NewPasswordRepeatWrong:
                                this.errorMsg = this.$t('auth.password-repeat-wrong');
                                break;
                            default:
                                this.errorMsg = this.$t('base.system-error');
                                break;
                        }
                    })
            }
        },
        mounted: function () {
            this.inviteCode = this.$route.params.code;
        },
    }
</script>