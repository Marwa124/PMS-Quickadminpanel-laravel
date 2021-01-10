/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import AssignPermissionsToUser from './components/AssignPermissionsToUser.vue';
import RolesIndex from './components/roles/Index.vue';
import DepartmentList from './components/departments/Index.vue';
import i18n from './plugins/i18n' // localization
import './filter';
import DepartmentCreate from './components/departments/Create.vue';
import DepartmentForm from './components/departments/Form.vue';

window.Vue = require('vue');

// import router from './router'

/* !!!: alert */
import BtnCreate from './components/form/BtnCreate'
Vue.component('BtnCreate', BtnCreate)

import DataTables from './components/dataTables/Filter.vue'; /// Data Tables
Vue.component('DataTables', DataTables)
import Pagination from './components/dataTables/Pagination.vue'; /// Data Tables
Vue.component('Pagination', Pagination)
import TableHead from './components/dataTables/TableHead.vue'; /// Data Tables
Vue.component('TableHead', TableHead)


import BtnUpdate from './components/form/BtnUpdate'
Vue.component('BtnUpdate', BtnUpdate)

// Evaluations
import Evaluation from './components/evaluations/Index'
Vue.component('Evaluation', Evaluation)

import EvaluationForm from './components/evaluations/Form'
Vue.component('EvaluationForm', EvaluationForm)




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
        RolesIndex,
        DepartmentList,
        DepartmentCreate,
        DepartmentForm,
        DataTables, // Data Tables
        
        // Evaluation,
    },
    // router,
});

