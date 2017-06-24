<template>

    <div class="uk-offcanvas-content">

        <div class="uk-navbar-container tm-navbar-container" uk-sticky="media: 960">
            <div class="uk-container uk-container-expand">
                <nav class="uk-navbar">

                    <div class="uk-navbar-left">

                        <a href="/" class="uk-navbar-item uk-logo">
                            {{title}}
                        </a>

                    </div>

                    <div class="uk-navbar-right">

                        <ul class="uk-navbar-nav uk-visible@m">
                            <router-link tag="li" :to="{ path: '/' }" exact><a>{{ $t("nav.home") }}</a></router-link>
                            <router-link tag="li" :to="{ path: '/code' }" exact><a>{{ $t("nav.invite-code") }}</a></router-link>
                        </ul>

                        <ul class="uk-navbar-nav uk-visible@m" v-if="!$store.state.isLogin">
                            <router-link tag="li" :to="{ path: '/auth/login' }" exact><a>{{ $t("auth.login") }}</a></router-link>
                            <router-link tag="li" :to="{ path: '/auth/register' }" exact><a>{{ $t("auth.register") }}</a></router-link>
                        </ul>

                        <ul class="uk-navbar-nav uk-visible@m" v-if="$store.state.isLogin">
                            <router-link tag="li" :to="{ path: '/logout' }" exact><a>Logout</a></router-link>
                        </ul>

                        <div class="uk-navbar-item uk-visible@m" v-if="$store.state.isLogin">
                            <router-link class="uk-button uk-button-default tm-button-default uk-icon" tag="li"
                                         :to="{ path: '/dashboard' }" exact>Dashboard
                                <canvas uk-icon="icon: download" width="20" height="20"></canvas>
                            </router-link>
                        </div>

                        <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon href="#offcanvas" uk-toggle></a>

                    </div>

                </nav>
            </div>
        </div>

       <LeftBar></LeftBar>

        <div class="tm-main uk-section uk-section-default">
            <div class="uk-container uk-container-small uk-position-relative">

                <router-view></router-view>

            </div>
        </div>



    </div>

</template>

<script>
    /* eslint-disable no-new */
    import axios from 'axios'
    import * as types from './store/types'
    import LeftBar from './components/Leftbar.vue'
    import Lang from './components/Lang.vue'

    export default {
        name: 'App',
        data () {
            return {
                title: 'ss-panel',
            }
        },
        methods: {
            handleCfg: function () {
                axios.get("/api/config")
                    .then(response => {
                        // JSON responses are automatically parsed.
                        this.title = response.data.data.app;
                        document.title = response.data.data.app;
                    })
                    .catch(e => {
                        this.errors.push(e)
                    })
            },
            checkToken: function () {
                let token = sessionStorage.getItem('token');
                let id = sessionStorage.getItem('id');
                if (!token) {
                    return false;
                }

                axios.get("/api/users/" + id)
                    .then(response => {
                        // JSON responses are automatically parsed.
                        console.log(response.data);
                    })
                    .catch(e => {
                        console.log(e);
                        return false;
                    });

                this.$store.commit(types.Login, {
                    token: token,
                    id: id,
                });
            },
            checkLang(){
                let lang = sessionStorage.getItem('lang');
                console.log("get lang from session: " +lang);
                if(!lang){
                    return false;
                }
                this.$store.commit(types.ChangeLocale,lang);
            }
        },
        mounted: function () {
            this.handleCfg();
            this.checkToken();
            this.checkLang();
        },
        components:{
            LeftBar,
            Lang,
        }
    }
</script>
