import Vue from 'vue'
import VueRouter from 'vue-router'

// Pages
import Index from './pages/Admin/Index.vue'

const routes = [
    {path: '/admin', name: 'index', component: Index},


];

const router = new VueRouter({
    routes,
    mode: 'history',
    history: true,
    linkActiveClass: 'active'
});

export default router;
