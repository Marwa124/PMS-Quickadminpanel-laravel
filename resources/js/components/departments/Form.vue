<template>
    <div>

         <div style="position: relative;">
            <alert-success :form="permissionsForm" message="Your changes have been saved!"></alert-success>
            <alert-errors :form="permissionsForm" message="There were some problems with your input."></alert-errors>
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fulid">
                <div class="card">
                    <!-- card-body -->
                    <div class="card-body">
                        <div class="wrapper-roles show-roles">
                            <div class="wrapper-role">
                                
                                <form @submit.prevent="departmentId ? updateDepartment() : createDepartment()" @keydown="form.onKeydown($event)">
                                    <div class="form-group">
                                        <label class="required" for="department_name" v-text="$t('cruds.department.fields.department_name')"></label>
                                        <input v-model="form.department_name" :class="{ 'is-invalid': form.errors.has('department_name') }"
                                            class="form-control" type="text" name="department_name" id="department_name" required>
                                        <has-error :form="form" field="department_name"></has-error>
                                    </div>
                                    <!-- {{form.department_name}} -->

                                    <!-- Designations_list -->
                                    <div class="form-group">
                                        <label for="designation_id" v-text="$t('cruds.department.fields.designations')"></label>
                                        <multiselect 
                                            :multiple="true" 
                                            :close-on-select="false" 
                                            :clear-on-select="false" 
                                            :preserve-search="true" 
                                            :placeholder="$t('select_designation')" 
                                            v-model="form.designations" 
                                            :options="designations"
                                            label="designation_name" 
                                            track-by="id" 
                                            :preselect-first="true"
                                        ></multiselect>
                                    </div>
                                    <!-- Designations_list -->

                                    <!-- department_head -->
                                    <div class="form-group">
                                        <label for="user_head_department" v-text="$t('cruds.department.fields.department_head')"></label>
                                        <multiselect 
                                            v-model="form.user_head_department" 
                                            :options="users" 
                                            :searchable="true" 
                                            :close-on-select="true" 
                                            :show-labels="false" 
                                            label="fullname" 
                                            track-by="user_id"
                                            :placeholder="$t('sidebar.choose_user')"
                                            :preselect-first="true"
                                            :custom-label="userFullname"
                                        ></multiselect>
                                        <has-error :form="form" field="user_head_department"></has-error>
                                    </div>

                                    <div class="d-flex">
                                        <button class="btn btn-primary btn-sm buttonload"
                                            type="submit" :disabled="form.busy">
                                            <i v-if="spinnerUpdateDepart" class="fa fa-spinner fa-spin"></i>
                                            <span v-text="departmentId ? $t('global.update') : $t('global.create')"
                                            ></span>
                                        </button>

                                        <button class="btn btn-secondary btn-sm ml-1" @click="backLocation">
                                            <span v-text="$t('global.back')"></span>
                                        </button>
                                    </div>



                                </form>


                                <form @submit.prevent="departmentPermissions()" @keydown="permissionsForm.onKeydown($event)">
                                <!-- <form @submit.prevent="departmentId ? updatePermission() : addPermission()" @keydown="permissionsForm.onKeydown($event)"> -->
                                    <div class="inner-role">
                                        <div class="global-form-handel">
                                            <!-- role-name-edit -->
                                            <div class="role-name-edit row d-flex justify-content-between" >
                                                <!-- actions -->
                                                <div class="col-sm-6 col-lg-4 col-xl-3 mt-5">
                                                    <div class="form-group form-group-input">
                                                        <!-- <label v-text="$t('global.actions')"></label> -->
                                                        <h3>Permissions</h3>
                                                        <div>
                                                            <button type="button" class="btn btn-dark waves-effect btn-sm btn-toggle-all-permissions" v-text="$t('global.toggle')" @click="toggleAllPermisssions"></button>
                                                            <button type="button" class="btn btn-dark waves-effect btn-sm" v-text="$t('global.add_all')" @click="addAllPermisssions"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ================================================================= -->
                                                <div class="col-sm-6 col-lg-4 col-xl-3 mt-4">
                                                    <div class="form-group mt-5">
                                                        <button class="btn btn-primary btn-sm buttonload"
                                                            type="submit" :disabled="permissionsForm.busy">
                                                            <i v-if="spinnerAction" class="fa fa-spinner fa-spin"></i>
                                                            <span v-text="departmentId ? $t('global.update_department_permissions') : $t('global.add_department_permissions')" 
                                                            ></span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- ./actions -->
                                                <!-- ================================================================= -->
                                            </div>
                                            <!-- ./role-name-edit -->
                                            <!-- =========================================================== -->
                                        </div>
                                        <div class="permissions" :class="{'wrapper-invalid': permissionsForm.errors.has('permissions') }">
                                            <div class="wrapper-group" v-for="(group, indexGroup) in groups" :key="group.id">
                                                <div class="group-header">
                                                    <div class="group-name">{{ group.name | slug | capitalize }}</div>
                                                    <div class="actions">
                                                        <button
                                                            type="button"
                                                            class="btn btn-dark waves-effect btn-sm btn-toggle-permissions-in-group"
                                                            v-text="$t('global.toggle')"
                                                            @click="togglePermisssionsInGroup(group.permissions)"
                                                        ></button>
                                                        <button
                                                            type="button"
                                                            class="btn btn-dark waves-effect btn-sm"
                                                            v-text="$t('global.add_all')"
                                                            @click="addAllPermisssionsInGroup(group.permissions)"
                                                        ></button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 inner-permission" v-for="(permission, indexPer) in group.permissions" :key="permission.id">
                                                        <div class="custom-control custom-switch">
                                                            <input
                                                                type="checkbox"
                                                                class="custom-control-input input-permission"
                                                                :id="'permission_' + form.id + indexGroup + indexPer + permission.name"
                                                                :value="permission.name"
                                                                v-model="permissionsForm.permissions"
                                                                >
                                                            <label class="custom-control-label label-permission"  :for="'permission_' + form.id + indexGroup + indexPer + permission.name">
                                                                {{ permission.name | slug | capitalize }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <!-- ./inner-permission -->
                                                </div> <!-- ./row -->
                                            </div>
                                            <!-- ./wrapper-permission -->
                                        </div>
                                        <!-- ./permissions -->

                                    </div>
                                </form>
                                <!-- End Permissions Form -->
                            </div>
                        </div>
                    </div>
                    <!-- ./card-body -->
                </div>
                <!-- card -->
            </div>
            <!--/. container -->
        </section>


    </div>
</template>


<script src="./assets/script"></script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style src="./assets/style.css"></style>


