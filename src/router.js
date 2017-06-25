import Vue from 'vue'
import VueRouter from 'vue-router'
import Index from './pages/Index.vue'
import Code from './pages/Code.vue'

// Auth
import Login from './pages/Auth/Login.vue'
import Logout from './pages/Auth/Logout.vue'

// Dashboard
import Node from './pages/Node.vue'

const routes = [
    {path: '/', component: Index},
    {path: '/code', component: Code},

    // Auth
    {path: '/auth/login', component: Login},
    {path: '/logout', component: Logout},

    // Dashboard
    {path: '/nodes', component: Node},
];

const router = new VueRouter({
    routes,
    mode: 'history',
    history: true,
    linkActiveClass: 'uk-active'
});

export default router;

