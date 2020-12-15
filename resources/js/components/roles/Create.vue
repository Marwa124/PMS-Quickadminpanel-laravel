<template>
    <div>
        <!-- Content Header (Page header) -->
        <header-comp :breadcrumb="breadcrumb"></header-comp>

        <!-- /.content-header -->
        <section class="content">
            <div class="container-fulid">
                <div class="card">
                    <!-- form -->
                    <form @submit.prevent="createRole()" class="global-form-handel">

                        <!-- card-body -->
                        <div class="card-body">
                            <div class="wrapper-roles create-roles">

                                <!-- role-name-edit -->
                                <div class="role-name-edit row">
                                    <div class="col-sm-6 col-lg-4 col-xl-3">
                                        <div class="form-group form-group-input">
                                            <label>{{ $t('roles_table.name') }}</label>
                                            <input
                                                v-model="roleForm.name"
                                                type="text"
                                                class="form-control form-control-sm"
                                                :class="{ 'is-invalid': roleForm.errors.has('name') }"
                                            >
                                            <has-error :form="roleForm" field="name"></has-error>
                                        </div>
                                    </div>
                                    <!-- ================================================================= -->
                                    <!-- actions -->
                                    <div class="col-sm-6 col-lg-4 col-xl-3">
                                        <div class="form-group form-group-input">
                                            <label v-text="$t('global.actions')"></label>
                                            <div>
                                                <button type="button" class="btn btn-dark waves-effect btn-sm btn-toggle-all-permissions" v-text="$t('global.toggle')"></button>
                                                <button type="button" class="btn btn-dark waves-effect btn-sm" v-text="$t('global.add_all')" @click="addAllPermisssions"></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./actions -->
                                    <!-- ================================================================= -->
                                </div>
                                <!-- ./role-name-edit -->
                                <!-- =========================================================== -->

                                <!-- permissions -->
                                <div class="permissions" :class="{'wrapper-invalid': roleForm.errors.has('permissions') }">
                                    <div class="wrapper-group" v-for="(group, indexGroup) in groups" :key="group.id">
                                        <div class="group-header">
                                            <div class="group-name">{{ group.name | slug | capitalize }}</div>
                                            <div class="actions">
                                                <button
                                                    type="button"
                                                    class="btn btn-dark waves-effect btn-sm btn-toggle-permissions-in-group"
                                                    v-text="$t('global.toggle')"
                                                ></button>
                                                <button
                                                    type="button"
                                                    class="btn btn-dark waves-effect btn-sm"
                                                    v-text="$t('global.add_all')"
                                                    @click="addAllPermisssionsInGroup(group.permissions)"
                                                ></button>
                                            </div>
                                        </div>
                                        <div class="inner-permission" v-for="(permission, indexPer) in group.permissions" :key="permission.id">
                                            <div class="custom-control custom-switch">
                                                <input
                                                    type="checkbox"
                                                    class="custom-control-input input-permission"
                                                    :id="'permission_' + indexGroup + indexPer + permission.name"
                                                    :value="permission.name"
                                                    v-model="roleForm.permissions"
                                                    >
                                                <label class="custom-control-label label-permission"  :for="'permission_' + indexGroup + indexPer + permission.name">
                                                    {{ permission.name | slug | capitalize }}
                                                </label>
                                            </div>
                                        </div>
                                        <!-- ./inner-permission -->
                                    </div>
                                    <!-- ./wrapper-permission -->
                                </div>
                                <input
                                    type="hidden"
                                    class="form-control"
                                    :class="{ 'is-invalid': roleForm.errors.has('permissions') }"
                                >
                                <has-error :form="roleForm" field="permissions"></has-error>
                                <!-- ./permissions -->

                            </div>
                            <!-- ./wrapper-roles -->
                        </div>
                        <!-- ./card-body -->

                        <!-- card-footer -->
                        <div class="card-footer">
                            <btn-create :form="roleForm"></btn-create>
                        </div> <!-- ./card-footer -->

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
import MixinChangeLocaleMessages from "./../../../../mixins/MixinChangeLocaleMessages"
export default {
    mixins: [
        MixinChangeLocaleMessages
    ],
    data() {
      return {
        urlModel: '/hr/roles',
        urlGetPermissions: '/hr/permissions',
        groups: [],
        roleForm: new Form({
            name: '',
            permissions: []
        }),
        idPage: 'roles',
        typePage: 'create',
        breadcrumb: [],
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
        createRole() {
            loadReq(this.$Progress)
            this.roleForm.post(this.urlModel).then(response => {
                if (response.status === 200) {
                    ToastReq.fire({
                        text: this.success_msg
                    })
                    setTimeout(() => {
                        this.$router.push({name: 'roles'})
                    }, 1000)
                }
            }).catch(response => {
                ToastFailed.fire({
                    title: this.failed_title + "!",
                    text: this.failed_msg,
                })
                this.$Progress.fail()
            });
        },
        addAllPermisssions() {
            let permissions = []
            this.groups.forEach(group => {
                group.permissions.forEach(permission => {
                    permissions.push(permission.name)
                })
            })
            this.roleForm.permissions = permissions
        },
        addAllPermisssionsInGroup(permissionsGroup) {
            let oldPermissions = [...this.roleForm.permissions]
            permissionsGroup.forEach(permission => {
                if (oldPermissions.indexOf(permission.name) == -1) {
                    oldPermissions.push(permission.name)
                }
            })
            this.roleForm.permissions = oldPermissions
        },
    },
    mounted() {
        this.breadcrumb = [
            {label: this.$t('sidebar.hr'), to: {name: 'hr-model'}},
            {label: this.$t('sidebar.roles'), to: {name: 'roles'}},
            {label: this.$t('global.create') + ' ' + this.$t('sidebar.new_role'), active: true},
        ]
        $('.create-roles').on('click', '.btn-toggle-all-permissions', function () {
            $('.create-roles .permissions .label-permission').click()
        })
        $('.create-roles').on('click', '.btn-toggle-permissions-in-group', function () {
            $(this).parentsUntil('.permissions').find('.label-permission').click()
        })
    },
    beforeRouteEnter(to, from, next) {
        next(vm => {
            to.meta.title = vm.$t('sidebar.roles')
            vm.$nextTick(() => {
                vm.getPermissions()
            })
        })
    }
}
</script>
