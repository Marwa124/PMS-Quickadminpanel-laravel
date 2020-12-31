<template>
    <div>
<!-- <h2>{{ this.$route }}</h2> -->
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fulid">
                <div class="card">
                    <!-- form -->
                    <form @submit.prevent="" class="global-form-handel">

                        <!-- card-body -->
                        <div class="card-body">
                            <div class="wrapper-roles assign-roles-permissions">

                                <h3 class="title-form-side">
                                    <!-- {{ 'Roles and Permissions for user' + ' ( ' + userData.fullname + ' )'}} -->
                                </h3>
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
import { Form, HasError, AlertError } from 'vform'
const axios = require('axios').default;
export default {
    data() {
      return {
        urlGetPermissions: '/admin/permissions',
        groups: [],
        form: new Form({
            permissions: []
        }),
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
        $('.assign-roles-permissions').on('click', '.btn-toggle-all-permissions', function () {
            $('.assign-roles-permissions .permissions .label-permission').click()
        })
        $('.assign-roles-permissions').on('click', '.btn-toggle-permissions-in-group', function () {
            $(this).parentsUntil('.permissions').find('.label-permission').click()
        })
    },
}
</script>
