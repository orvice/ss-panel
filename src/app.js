import Vue from 'vue'
import VueRouter from 'vue-router'
import VueI18n from 'vue-i18n'
import Vuex from 'vuex'
import App from './app.vue'
import router from './router'

import UIkit from 'uikit'
Vue.use(VueRouter);
Vue.use(VueI18n);
Vue.use(Vuex);


window.DocsApp = new Vue({
    router,
    el: '#app',
    extends: App,
    data: () => ({
        ids: {},
        page: false,
        component: false
    })
});

