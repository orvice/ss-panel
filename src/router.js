import Vue from 'vue'
import VueRouter from 'vue-router'
import Index from './pages/Index.vue'
import Code from './pages/Code.vue'

// Auth
import Login from './pages/Auth/Login.vue'
import Logout from './pages/Auth/Logout.vue'

const routes = [
    {path: '/', component: Index},
    {path: '/code', component: Code},

    {path: '/auth/login', component: Login},
    {path: '/logout', component: Logout}
];

const router = new VueRouter({
    routes,
    mode: 'history',
    history: true,
    linkActiveClass: 'uk-active'
});

export default router;

