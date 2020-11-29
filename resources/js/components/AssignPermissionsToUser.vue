<template>
    <div>
<!-- <h2>{{ this.$route }}</h2> -->
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fulid">
                <div class="card">
                    <!-- form -->
                    <form @submit.prevent="assignToUser()" class="global-form-handel">

                        <!-- card-body -->
                        <div class="card-body">
                            <div class="wrapper-roles assign-roles-permissions">

                                <h3 class="title-form-side">
                                    {{ 'Roles and Permissions for user' + ' ( ' + userData.fullname + ' )'}}
                                </h3>
                                <div class="form-title">
                                    <h3 class="text" v-text="'roles'"></h3>
                                </div>
                                <!-- =========================================================== -->

                                <!-- roles -->
                                <div class="permissions">
                                    <div class="wrapper-group">
                                        <!-- <div class="group-name" v-text="roles"></div> -->
                                        <div class="inner-permission" v-for="role in roles" :key="role">
                                            <div class="custom-control custom-switch">
                                                <input
                                                    type="checkbox"
                                                    class="custom-control-input"
                                                    :id="'permission_' + role"
                                                    :value="role"
                                                    v-model="form.roles"
                                                    >
                                                <label class="custom-control-label"  :for="'permission_' + role">
                                                    <div class="value-label">
                                                        {{ role | slug | capitalize }}
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <!-- ./inner-permission -->
                                    </div>
                                    <!-- ./wrapper-permission -->
                                </div>
                                <!-- ./roles -->
                                <!-- =========================================================== -->


                                <div class="row mt-4 mb-1">
                                    <div class="col-sm-6 col-lg-4 col-xl-3">
                                        <div class="form-title">
                                            <h3 class="text" v-text="'permissions'"></h3>
                                        </div>
                                    </div>
                                    <!-- ================================================================= -->
                                    <!-- actions -->
                                    <div class="col-sm-6 col-lg-4 col-xl-3">
                                        <div class="pt-2">
                                            <button type="button" class="btn btn-dark waves-effect btn-sm btn-toggle-all-permissions" v-text="'toggle'"></button>
                                            <button type="button" class="btn btn-dark waves-effect btn-sm" v-text="'add_all'" @click="addAllPermisssions"></button>
                                        </div>
                                    </div>
                                    <!-- ./actions -->
                                    <!-- ================================================================= -->
                                </div>
                                <!-- =========================================================== -->

                                <!-- permissions -->
                                <div class="permissions">
                                    <div class="wrapper-group" v-for="(group, indexGroup) in groups" :key="group.id">
                                        <div class="group-header">
                                            <div class="group-name my-3">{{ group.name | slug | capitalize }}</div>
                                            <div class="actions mb-2">
                                                <button
                                                    type="button"
                                                    class="btn btn-dark waves-effect btn-sm btn-toggle-permissions-in-group"
                                                    v-text="'toggle'"
                                                ></button>
                                                <button
                                                    type="button"
                                                    class="btn btn-dark waves-effect btn-sm"
                                                    v-text="'add_all'"
                                                    @click="addAllPermisssionsInGroup(group.permissions)"
                                                ></button>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-3" v-for="(permission, indexPer) in group.permissions" :key="permission.id">
                                            <div class="custom-control custom-switch">
                                                <input
                                                    type="checkbox"
                                                    class="custom-control-input input-permission"
                                                    :id="'permission_' + indexGroup + indexPer + permission.name"
                                                    :value="permission.name"
                                                    v-model="form.permissions"
                                                    >
                                                <label class="custom-control-label label-permission"  :for="'permission_' + indexGroup + indexPer + permission.name">
                                                    {{ permission.name | slug | capitalize }}
                                                </label>
                                            </div>
                                        </div>
                                        </div>
                                        <!-- ./col-md-3 -->
                                    </div>
                                    <!-- ./wrapper-permission -->
                                </div>
                                <!-- ./permissions -->
                                <!-- =========================================================== -->

                            </div>
                        </div>
                        <!-- ./card-body -->

                        <!-- card-footer -->
                        <div class="card-footer">
                            <btn-update :form="form"></btn-update>
                        </div>
                        <!-- ./card-footer -->

                    </form>
                    <!-- ./form -->
                </div>
                <!-- card -->
            </div>
            <!--/. container -->
        </section>
    </div>
</template>


<script>
import Vue from 'vue'
import { Form, HasError, AlertError } from 'vform'
const axios = require('axios').default;
var id = window.location.href.split('/').pop();
// import MixinChangeLocaleMessages from "./../../../mixins/MixinChangeLocaleMessages"
export default {
    props: ['userId'],
    mixins: [
        // MixinChangeLocaleMessages
    ],
    data() {
      return {
        url_users_list: '/admin/users_list',
        urlAssignToUser: '/admin/assign_to_user/',
        urlGetPermissions: '/admin/permissions',
        urlGetNameRoles: '/admin/name_roles',
        urlGetUserPermissions: '/admin/roles_permissions_for_user/',
        userData: {
            fullname: '',
            user: {},
            roles: [],
            permissions: []
        },
        roles: [],
        groups: [],
        form: new Form({
            roles: [],
            permissions: []
        }),
        // idPage: 'users',
        // typePage: 'edit',
      }
    },
    methods: {
        getPermissions() {
            axios.get(this.urlGetPermissions).then(response => {
                if (response.status === 200) {
                    const data = response.data
                    if (typeof data === 'object') {
                        this.groups = data.data
                    } else {
                        setTimeout(() => {
                            this.getPermissions()
                        }, 500)
                    }
                }
            })
            .catch(errors => {
                setTimeout(() => {
                    this.getPermissions()
                }, 500)
            })
        },
        getRoles() {
            axios.get(this.urlGetNameRoles).then(response => {
                if (response.status === 200) {
                    const data = response.data
                    if (typeof data === 'object') {
                        this.roles = data.data
                    } else {
                        setTimeout(() => {
                            this.getRoles()
                        }, 500)
                    }
                }
            })
            .catch(errors => {
                setTimeout(() => {
                    this.getRoles()
                }, 500)
            })
        },
        async getUserPermissions() {
            await axios.get(this.urlGetUserPermissions + this.userId).then(response => {
                // console.log(this.$route);
                console.log(id);
                console.log(this.userId +'   xxxxx');
                console.log(response);
                if (response.status === 200) {
                    const data = response.data
                    if (typeof data === 'object') {
                        const userData = data.data
                        if (userData.user != null) {
                            this.userData = userData
                            this.form.roles = userData.roles
                            this.form.permissions = userData.permissions
                        } else {
                            // this.$router.push({name: 'users'})
                        }
                    } else {
                        setTimeout(() => {
                            this.getRoles()
                        }, 500)
                    }
                }
            })
            .catch(errors => {
                setTimeout(() => {
                    this.getRoles()
                }, 500)
            })
        },
        assignToUser() {
            // loadReq(this.$Progress)
            this.form.put(this.urlAssignToUser + this.userId).then(response => {
                if (response.status === 200) {
                    // ToastReq.fire({
                    //     text: this.success_msg
                    // })
                    // setTimeout(() => {
                    //     this.$router.push({name: 'users'})
                    // }, 1000)
                }
            }).catch(response => {
                // ToastFailed.fire({
                //     title: this.failed_title + "!",
                //     text: this.failed_msg,
                // })
                // this.$Progress.fail()
            });
        },
        addAllPermisssions() {
            let permissions = []
            this.groups.forEach(group => {
                group.permissions.forEach(permission => {
                    permissions.push(permission.name)
                })
            })
            this.form.permissions = permissions
        },
        addAllPermisssionsInGroup(permissionsGroup) {
            let oldPermissions = [...this.form.permissions]
            permissionsGroup.forEach(permission => {
                if (oldPermissions.indexOf(permission.name) == -1) {
                    oldPermissions.push(permission.name)
                }
            })
            this.form.permissions = oldPermissions
        },
    },
    mounted() {
        this.getPermissions();
        this.getRoles();
        this.getUserPermissions();
        $('.assign-roles-permissions').on('click', '.btn-toggle-all-permissions', function () {
            $('.assign-roles-permissions .permissions .label-permission').click()
        })
        $('.assign-roles-permissions').on('click', '.btn-toggle-permissions-in-group', function () {
            $(this).parentsUntil('.permissions').find('.label-permission').click()
        })
    },
    // beforeRouteEnter(to, from, next) {
    //     next(vm => {
    //         to.meta.title = vm.$t('sidebar.assign_per_to_user')
    //         vm.$nextTick(() => {
    //             vm.getUser().then(() => {
    //                 vm.getPermissions()
    //                 vm.getRoles()
    //             })
    //         })
    //     })
    // }
}
</script>
