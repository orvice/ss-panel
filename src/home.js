import Vue from 'vue'
import VueRouter from 'vue-router'
import VueI18n from 'vue-i18n'
import Home from './Home.vue'
import router from './homeRouter'
import store  from './store/'
import {Locales} from './lang'

Vue.use(VueRouter);
Vue.use(VueI18n);

Vue.config.lang = store.state.lang;

Object.keys(Locales).forEach(function (lang) {
    Vue.locale(lang, Locales[lang]);
});

window.App = new Vue({
    router,
    store,
    // i18n,
    el: '#app',
    extends: Home,
    data: () => ({
        ids: {},
        page: false,
        component: false
    })
});