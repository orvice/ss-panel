<template>

    <div class="tm-sidebar-left uk-visible@m">

        <ul class="uk-nav-default uk-nav-parent-icon" uk-nav v-if="!$store.state.isLogin">
        <li > <router-link tag="li" :to="{ path: '/' }" exact><a>{{ $t("nav.home") }}</a></router-link></li>
            <li > <router-link tag="li" :to="{ path: '/code' }" exact><a>{{ $t("nav.invite-code") }}</a></router-link></li>
            <li class="uk-nav-divider"></li>
        </ul>


        <ul class="uk-nav-default uk-nav-parent-icon" uk-nav v-if="$store.state.isLogin">
            <li class="uk-nav-header">{{ $t("user-nav.user-home") }}</li>
            <li><router-link tag="li" :to="{ path: '/nodes' }" exact> <a href="#"><span class="uk-margin-small-right" uk-icon="icon: table"></span>
                {{ $t("user-nav.node-list") }}</a> </router-link> </li>
            <li><router-link tag="li" :to="{ path: '/node' }" exact> <a href="#"><span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span> Item </a> </router-link></li>
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
