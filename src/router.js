import Vue from 'vue'
import VueRouter from 'vue-router'
import Index from './pages/Index.vue'
import Code from './pages/Code.vue'

// Auth
import Login from './pages/Auth/Login.vue'
import Logout from './pages/Auth/Logout.vue'

// Dashboard
import Dashboard from './pages/Dashboard.vue'
import Node from './pages/Node.vue'
import TrafficLog from './pages/TrafficLog.vue'
import Invite from './pages/Invite.vue'
import Setting from './pages/Setting.vue'
import Profile from './pages/Profile.vue'

const routes = [
    {path: '/', name: 'index', component: Index},
    {path: '/code', name: 'code', component: Code},

    // Auth
    {path: '/auth/login', name: 'login', component: Login},
    {path: '/logout', name: 'logout', component: Logout},

    // Dashboard
    {path: '/dashboard', name: 'dashboard', component: Dashboard},
    {path: '/trafficLogs', name: 'trafficLogs', component: TrafficLog},
    {path: '/nodes', name: 'nodes', component: Node},
    {path: '/profile', name: 'profile', component: Profile},
    {path: '/invite', name: 'invite', component: Invite},
    {path: '/setting', name: 'setting', component: Setting},
];

const router = new VueRouter({
    routes,
    mode: 'history',
    history: true,
    linkActiveClass: 'uk-active'
});

export default router;

