<template>

    <div>
        <ul class="uk-nav uk-nav-default">

            <li class="uk-nav-header">
                {{ $t("user-nav.admin-panel") }}
            </li>
            <li class="uk-nav">
                <router-link tag="li" :to="{ name: 'index' }" exact><a href="#"><span class="uk-margin-small-right"
                                                                                          uk-icon="icon: user"></span>
                    {{ $t("user-nav.admin-panel") }}</a></router-link>
            </li>

            <li class="uk-nav">
                <router-link tag="li" :to="{ name: 'nodes' }" exact><a href="#"><span class="uk-margin-small-right"
                                                                                      uk-icon="icon: server"></span>
                    {{$t("ss.node")}}</a></router-link>
            </li>

            <li class="uk-nav">
                <router-link tag="li" :to="{ name: 'invites' }" exact><a href="#"><span class="uk-margin-small-right"
                                                                                      uk-icon="icon: nut"></span>
                    {{$t("nav.invite-code")}}</a></router-link>
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
