<template>

    <div>
        <ul class="uk-nav uk-nav-default">

            <li class="uk-nav-header">
                {{ $t("user-nav.admin-panel") }}
            </li>
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
                <router-link tag="li" :to="{ name: 'config' }" exact><a href="#"><span class="uk-margin-small-right"
                                                                                        uk-icon="icon: settings"></span>
                    {{ $t("admin-nav.config") }} </a></router-link>
            </li>
            <li class="uk-nav">
                <router-link tag="li" :to="{ name: 'invite' }" exact><a href="#"><span class="uk-margin-small-right"
                                                                                       uk-icon="icon: users"></span>
                    {{ $t("user-nav.invite-friend") }} </a></router-link>
            </li>


            <li class="uk-nav-divider"></li>
        </ul>
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
                navigation: {}
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
