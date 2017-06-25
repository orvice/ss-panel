<template>

    <div class="tm-sidebar-left uk-visible@m">

        <ul class="uk-nav-default uk-nav-parent-icon" uk-nav v-if="!$store.state.isLogin">
            <li>
                <router-link tag="li" :to="{ path: '/' }" exact><a>{{ $t("nav.home") }}</a></router-link>
            </li>
            <li>
                <router-link tag="li" :to="{ path: '/code' }" exact><a>{{ $t("nav.invite-code") }}</a></router-link>
            </li>
            <li class="uk-nav-divider"></li>
        </ul>


        <ul class="uk-nav-default uk-nav-parent-icon" uk-nav v-if="$store.state.isLogin">
            <li class="uk-nav-header">{{ $t("user-nav.user-home") }}</li>
            <li class="uk-nav">
                <router-link tag="li" :to="{ name: 'dashboard' }" exact><a href="#"><span class="uk-margin-small-right"
                                                                                          uk-icon="icon: user"></span>
                    {{ $t("user-nav.dashboard") }}</a></router-link>
            </li>
            <li class="uk-nav">
                <router-link tag="li" :to="{ name: 'nodes' }" exact><a href="#"><span class="uk-margin-small-right"
                                                                                      uk-icon="icon: server"></span>
                    {{ $t("user-nav.node-list") }}</a></router-link>
            </li>
            <li class="uk-nav">
                <router-link tag="li" :to="{ name: 'trafficLogs' }" exact><a href="#"><span
                        class="uk-margin-small-right"
                        uk-icon="icon: cloud-download"></span>
                    {{ $t("user-nav.traffic-log") }}</a></router-link>
            </li>
            <li class="uk-nav">
                <router-link tag="li" :to="{ name: 'profile' }" exact><a href="#"><span class="uk-margin-small-right"
                                                                                        uk-icon="icon: thumbnails"></span>
                    {{ $t("user-nav.my-profile") }} </a></router-link>
            </li>
            <li class="uk-nav">
                <router-link tag="li" :to="{ name: 'invite' }" exact><a href="#"><span class="uk-margin-small-right"
                                                                                       uk-icon="icon: users"></span>
                    {{ $t("user-nav.invite-friend") }} </a></router-link>
            </li>
            <li class="uk-nav">
                <router-link tag="li" :to="{ name: 'setting' }" exact><a href="#"><span class="uk-margin-small-right"
                                                                                        uk-icon="icon: settings"></span>
                    {{ $t("base.setting") }} </a></router-link>
            </li>
            <li class="uk-nav-divider"></li>
        </ul>


        <div>
            <Lang></Lang>
        </div>

    </div>


</template>

<script>
    /* eslint-disable no-new */
    import axios from 'axios'
    import * as types from '../store/types'
    import Lang from './Lang.vue'

    export default {
        name: 'LeftBar',
        data () {
            return {
                navigation: {
                    "Pages": {
                        "Home": "/",
                        "Code": "/code"
                    },

                    "Dashboard": {
                        "Node": "/nodes",
                        "Profile": "/profile",
                        "Logout": "/logout",
                    }
                }
            }
        },
        methods: {},
        mounted: function () {
        },
        components: {
            Lang,
        }
    };
</script>
