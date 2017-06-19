import Vue from 'vue'
import VueRouter from 'vue-router'
import VueI18n from 'vue-i18n'
import App from './app.vue'
import Index from './pages/Index.vue'
import Code from './pages/Code.vue'

import UIkit from 'uikit'
Vue.use(VueRouter);
Vue.use(VueI18n);

const routes = [
    {path: '/', component: Index},
    {path: '/code', component: Code}
];

const router = new VueRouter({
    routes,
    mode: 'history',
    history: true,
    linkActiveClass: 'uk-active'
});

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

