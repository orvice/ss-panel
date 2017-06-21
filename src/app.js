import Vue from 'vue'
import VueRouter from 'vue-router'
import VueI18n from 'vue-i18n'
import VueCookie from 'vue-cookie'
import App from './App.vue'
import router from './router'
import store  from './store/'

import UIkit from 'uikit'
Vue.use(VueRouter);
Vue.use(VueI18n);
Vue.use(VueCookie);


window.DocsApp = new Vue({
    router,
    store,
    el: '#app',
    extends: App,
    data: () => ({
        ids: {},
        page: false,
        component: false
    })
});

