import Vue from 'vue'
import VueRouter from 'vue-router'

// Pages
import Index from './pages/Admin/Index.vue'
import Config from './pages/Admin/Config.vue'
import Node from './pages/Admin/Node.vue'
import User from './pages/Admin/User.vue'

const routes = [
    {path: '/admin', name: 'index', component: Index},
    {path: '/admin/config', name: 'config', component: Config},
    {path: '/admin/nodes', name: 'nodes', component: Node},
    {path: '/admin/users', name: 'users', component: User},
];

const router = new VueRouter({
    routes,
    mode: 'history',
    history: true,
    linkActiveClass: 'active'
});

export default router;
