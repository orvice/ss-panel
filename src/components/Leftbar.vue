<template>

    <div class="tm-sidebar-left uk-visible@m">

        <ul class="uk-nav uk-nav-default tm-nav" :class="{ 'uk-margin-top': index }"
            v-for="(pages, category, index) in navigation">
            <li class="uk-nav-header">{{category}}</li>
            <router-link tag="li" :to="p" :key="p" v-for="(p, label) in pages" exact><a>{{label}}</a></router-link>
        </ul>

        <div>
        </div>
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
        methods: {

        },
        mounted: function () {
        },
        components:{
            Lang,
        }
    };
</script>
