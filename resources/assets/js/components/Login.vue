<template>
    <div>
        <form @submit.prevent="login" id="loginForm" action="" method="post">
            <div class="form-group has-feedback">
                <input v-model="email" id="email" name="email" type="text" class="form-control" placeholder="Email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input v-model="password" id="passwd" name="password" type="password" class="form-control"
                       placeholder="Password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
        </form>

        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input id="remember_me" value="week" type="checkbox"> {{rememberMe}}
                    </label>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <button v-on:click="login" type="submit" class="btn btn-primary btn-block btn-flat"> {{loginStr}}
                </button>
            </div><!-- /.col -->
        </div>

        <div v-if="showInfo"
             v-bind:class="[success ? 'alert-info' : 'alert-warning', 'alert  alert-dismissable' ]">
            <button type="button" class="close" id="ok-close" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info"></i>Success!</h4>
            <p>{{infoMsg}}</p>
        </div>


    </div>
</template>

<script>
    export default {
        data () {
            return {
                email: '',
                password: '',
                failed: false,
                success: false,
                showInfo: false,
                infoMsg: '',
            }
        },
        props: ['rememberMe', 'loginStr'],
        methods: {
            login () {
                this.$http.post('/auth/login', {
                    email: this.email,
                    password: this.password,
                }, {
                    headers: {},
                    emulateJSON: true
                }).then(function (response) {
                    // Login Success
                    this.showInfo = true;
                    this.success = true;
                    this.infoMsg = response.data.msg;
                    console.log("login success");
                    this.$cookie.set('token', response.data.token, 1);
                }, function (response) {
                    // Fail
                    this.showInfo = true;
                    this.infoMsg = response.data.msg;
                    console.log(response)
                });
            }
        }
    }
</script>