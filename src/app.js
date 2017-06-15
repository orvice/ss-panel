import Vue from 'vue';
import VueRouter from 'vue-router';
import Index from './pages/Index.vue';
import Code from './pages/Code.vue';
import Navbar from './components/Navbar.vue';
//import analytics from './analytics.js';
// //import navigation from '../docs/app/navigation.json';
import App from './App.vue'
// Pages
//import IndexPage from './pages/index.vue';
//import ErrorPage from './pages/404.vue';

//import plugin from './assets/js/icons.js'
//import UIkit from './assets/js/uikit.js'

//import  autotrack from 'autotrack'
import marked from 'marked'
import jquery from 'jquery'
import UIkit from 'uikit'

Vue.use(VueRouter);

var base = '/';

if (location.pathname && location.pathname != '/') {
    base = location.pathname.split('/').slice(0, -1).join('/');
}

const routes = [
    {path: '/', component: Index},
    {path: '/index', component: Index},
    {path: '/code', component: Code},
    {path: '/*', component: Index}
];

const router = new VueRouter({
    base,
    routes,
    mode: 'history',
    history: true,
    linkActiveClass: 'uk-active'
});

//Vue.component('navbar', Navbar);

new Vue({

    router,

    el: '#app',

    extends: App,

    data: () => ({
        page: false,
        loading: false
    })

});

// analytics();