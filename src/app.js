import Vue from 'vue'
import VueRouter from 'vue-router'
import VueI18n from 'vue-i18n'
import App from './App.vue'
import router from './router'
import store  from './store/'
import {Locales} from './lang'

window.$ = window.jQuery = require('jquery');

Vue.use(VueRouter);
Vue.use(VueI18n);

Vue.config.lang = store.state.lang;

Object.keys(Locales).forEach(function (lang) {
    Vue.locale(lang, Locales[lang]);
});

let lang = store.state.lang;

// Ready translated locale messages
// Create VueI18n instance with options
// const i18n = new VueI18n({
//     fallback: 'en',
//     locale: lang, // set locale
//     messages: Locales, // set locale messages
// });

window.App = new Vue({
    router,
    store,
    // i18n,
    el: '#app',
    extends: App,
    data: () => ({
        ids: {},
        page: false,
        component: false
    })
});

