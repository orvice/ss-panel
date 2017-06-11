/**
 * Home
 */

require('./bootstrap');

Vue.component('login', require('./components/Login.vue'));

new Vue({
    el: '#app'
});