require('./bootstrap');

import Vue from 'vue';
import VueConfirmDialog from 'vue-confirm-dialog';
import App from './vue/app';

Vue.use(VueConfirmDialog);
Vue.component('vue-confirm-dialog', VueConfirmDialog.default);

const app = new Vue({
    el: '#app',
    components: { App }
});
