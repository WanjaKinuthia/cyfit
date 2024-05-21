import './bootstrap';
window.Vue = require('vue');

Vue.component('app', require('./components/app.vue'));

const app = new Vue({
    el: '#app'
});