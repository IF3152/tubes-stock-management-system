
require('./bootstrap');

window.Vue = require('vue');

Vue.component('example', require('./components/Example.vue'));
Vue.component('rincian-pemesanan', require('./components/RincianPemesanan.vue'));

const app = new Vue({
    el: '#app'
});