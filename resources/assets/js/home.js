/**
 * Home
 */

require('./bootstrap');

Vue.component('login', require('./components/Home/Home.vue'));

new Vue({
    el: '#app'
});