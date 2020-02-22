require('./bootstrap');

window.Vue = require('vue');
Vue.component('login-form', require('./components/LoginForm.vue').default);
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import Vue from 'vue'
Vue.use(BootstrapVue);
Vue.use(IconsPlugin)

const app = new Vue({
    el: '#app',
    data() {
        return { }
    },
    methods: {},
});
