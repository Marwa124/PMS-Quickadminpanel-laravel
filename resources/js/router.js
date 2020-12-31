import Vue from 'vue';
import VueRouter from 'vue-router';
import Departments from './components/departments/Index'
import DepartmentsCreate from './components/departments/Create'
import DepartmentsForm from './components/departments/Form'

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/admin/hr/departments/list',
            name: 'departments-list',
            meta: {
                // permission: 'index-roles'
            },
            component: Departments
        },
        {
            path: '/admin/hr/departments/create',
            name: 'departments-create',
            meta: {
                // permission: 'index-roles'
            },
            component: DepartmentsCreate
        },
        {
            path: '/admin/hr/departments/:id/edit',
            name: 'departments-edit',
            meta: {
                // permission: 'index-roles'
            },
            component: DepartmentsForm,
            props: true
        },
    ],
    mode: 'history',
})
