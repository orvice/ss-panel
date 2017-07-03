import Vue from 'vue'
import VueRouter from 'vue-router'
import Index from './pages/Index.vue'
import Code from './pages/Code.vue'

// Auth
import Login from './pages/Auth/Login.vue'
import Register from './pages/Auth/Register.vue'
import Logout from './pages/Auth/Logout.vue'


const routes = [
    {path: '/', name: 'index', component: Index},
    {path: '/code', name: 'code', component: Code},

    // Auth
    {path: '/auth/login', name: 'login', component: Login},
    {path: '/auth/register', name: 'register', component: Register},
    {path: '/auth/register/:code', name: 'registerWithCode', component: Register},
    {path: '/logout', name: 'logout', component: Logout},

];

const router = new VueRouter({
    routes,
    mode: 'history',
    history: true,
    linkActiveClass: 'active'
});

export default router;

