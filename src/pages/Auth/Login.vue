<template>

    <div>
        <div ref="container">
            <div class="uk-width-1-1">
                <div class="uk-container">
                    <div class="uk-overflow-auto">
                        <p class="uk-table uk-table-divider">
                            Login
                        </p>

                        <form>

                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                                    <input class="uk-input" type="text" v-model="email">
                                </div>
                            </div>

                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                    <input class="uk-input" type="text" v-model="password">
                                </div>
                            </div>

                        </form>

                        <div class="uk-margin">
                            <div class="uk-inline">
                                <p uk-margin>
                                    <button class="uk-button uk-button-primary" @click="login">Login</button>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</template>

<script>
    import axios from 'axios'
    export default {
        name: 'code',
        components: {},
        data () {
            return {
                email: '',
                password: '',
                message: '',
            }
        },
        methods: {
            login() {
                console.log("start login");
                axios.post("/api/auth/login", {
                    email: this.email,
                    password: this.password,
                })
                    .then(response => {
                        console.log("success");
                        console.log(response.data.data);
                        this.$cookie.set('Token', response.data.data.token, 1);
                        console.log("set cookie");
                    })
                    .catch(e => {
                        console.log("error");
                        if (e.response) {
                            console.log(e.response.status);
                        }
                    })
            }
        }
    }
</script>