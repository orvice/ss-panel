import Vue from 'vue'
import VueResource from 'vue-resource'
import VueCookie from 'vue-cookie'


Vue.use(VueResource);
Vue.use(VueCookie);

window._ = require('lodash');


// window.$ = window.jQuery = require('jquery');

require('bootstrap-sass');

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */
//window.Vue = Vue;

window.Vue = require('vue');
require('vue-resource');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');



window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};


