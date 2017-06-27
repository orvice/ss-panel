<template>
    <div>
        <!-- Navbar -->
        <nav class="navbar navbar-toggleable-md  fixed-top bg-primary navbar-transparent  " color-on-scroll="500">
            <div class="container">
                <div class="navbar-translate">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                            data-target="#navigation" aria-controls="navigation-index" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="/" rel="tooltip"
                        data-placement="bottom" target="_blank">
                        {{title}}
                    </a>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navigation"
                     data-nav-image="../assets/img/blurred-image-1.jpg">

                    <ul class="navbar-nav">
                        <router-link tag="li" :to="{ path: '/' }" exact><li class="nav-item"><a class="nav-link">{{ $t("nav.home") }}</a></li></router-link>
                        <router-link tag="li" :to="{ path: '/code' }" exact><li class="nav-item"><a class="nav-link">{{ $t("nav.invite-code") }}</a></li>
                        </router-link>
                    </ul>

                    <ul class="navbar-nav" v-if="!$store.state.isLogin">
                        <router-link tag="li" :to="{ path: '/auth/login' }" exact><li class="nav-item"><a class="nav-link">{{ $t("auth.login") }}</a></li></router-link>
                        <router-link tag="li" :to="{ path: '/code' }" exact><li class="nav-item"><a class="nav-link">{{ $t("auth.register") }}</a></li>
                        </router-link>
                    </ul>

                    <ul class="navbar-nav" v-if="$store.state.isLogin">
                        <li class="nav-item"><a class="nav-link" href="/dashboard">{{ $t("user-nav.dashboard") }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="/logout">{{ $t("auth.logout") }}</a></li>
                    </ul>

                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="wrapper">
            <div class="page-header clear-filter" >
                <div class="page-header-image" data-parallax="true"
                     style="background-image: url('../assets/img/header.jpg');">
                </div>
                <router-view></router-view>
            </div>
            <div class="wrapper">
            </div>
            <footer class="footer">
                <div class="container">
                    <nav>
                        <ul>
                            <li>
                                <a href="/dashboard">
                                    Dashboard
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright">
                        &copy;
                        {{year}}, Powered by
                        <a href="https://github.com/orvice/ss-panel" target="_blank">ss-panel</a>.
                    </div>
                </div>
            </footer>
        </div>
    </div>
</template>

<script>
    /* eslint-disable no-new */
    import * as types from './store/types'
    import LeftBar from './components/Leftbar.vue'
    import Lang from './components/Lang.vue'
    import rest from './http/rest'
    import http from './http/base'

    export default {
        name: 'App',
        data () {
            return {
                title: 'ss-panel',
                user: {},
                year: 2017,
            }
        },
        methods: {
            handleCfg: function () {
                http.get("config")
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
                this.$store.commit(types.Login, {
                    token: token,
                    id: id,
                });
            },
            checkLang(){
                let lang = sessionStorage.getItem('lang');
                console.log("get lang from session: " + lang);
                if (!lang) {
                    return false;
                }
                this.$store.commit(types.ChangeLocale, lang);
            },
            initUser(){
                rest.get("")
                    .then(response => {
                        // JSON responses are automatically parsed.
                        this.user = response.data;
                        console.log(this.user);
                    })
                    .catch(e => {
                        this.errors.push(e)
                    })
            }
        },
        mounted: function () {
            this.handleCfg();
            this.checkToken();
            this.initUser();
            this.checkLang();
        },
        components: {
            LeftBar,
            Lang,
        }
    }
</script>
