/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import AssignPermissionsToUser from './components/AssignPermissionsToUser.vue';
import RolesIndex from './components/roles/Index.vue';
import i18n from './plugins/i18n' // localization
import './filter';

window.Vue = require('vue');


// import router from './router'

/* !!!: alert */
import BtnCreate from './components/form/BtnCreate'
Vue.component('BtnCreate', BtnCreate)

import BtnUpdate from './components/form/BtnUpdate'
Vue.component('BtnUpdate', BtnUpdate)

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('assign-permissions-to-user', require('./components/AssignPermissionsToUser.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    i18n,
    components: {
        AssignPermissionsToUser,
        RolesIndex
    },
    // router
});

