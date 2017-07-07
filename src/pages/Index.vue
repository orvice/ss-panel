<template>

    <div class="container">
        <div class="content-center">
            <h1 class="title text-center"> {{title}} </h1>
            <h3 class="category" v-if="false"></h3>
            <h4 class="description text-center">{{body}}</h4>
            <a href="/dashboard"
               class="btn btn-primary btn-lg btn-round" v-if="$store.state.isLogin">{{ $t("user-nav.dashboard") }}</a>
            <router-link :to="{ name: 'register' }" exact>
                <a href="/auth/register"
                   class="btn btn-primary btn-lg btn-round" v-if="!$store.state.isLogin">{{ $t("auth.register") }}</a>
            </router-link>

        </div>
    </div>

</template>

<script>
    /* eslint-disable no-new */
    import * as types from '../store/types'
    import rest from '../http/rest'
    import http from '../http/base'

    export default {
        name: 'App',
        data () {
            return {
                title: 'ss-panel',
                body: 'Open Your Eyes',
                user: {},
                year: 2017,
            }
        },
        methods: {
            handleCfg: function () {
                http.get("config")
                    .then(response => {
                        document.title = response.data.data.app;
                        this.title = response.data.data.app;
                        this.body = response.data.data.index_message;
                    })
                    .catch(e => {
                    })
            },
        },
        mounted: function () {
            this.handleCfg();
        },
        components: {}
    }
</script>
