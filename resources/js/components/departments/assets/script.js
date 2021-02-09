import { Form, HasError, AlertErrors, AlertSuccess } from 'vform'
import i18n from '../../../plugins/i18n';

import Multiselect from 'vue-multiselect'

export default {
    components: {HasError, AlertErrors, AlertSuccess, Multiselect},
    props: ['roleId', 'langKey', 'departmentId'],
    data() {
      return {
        urlGetPermissions:    '/admin/permissions',
        urlGetDesignations:   '/api/v1/admin/hr/designations',
        urlGetDepartment:     '/api/v1/admin/hr/departments/'+this.departmentId,
        urlGetAccountDetails: '/api/v1/admin/hr/account-details',
        urlSetDepartmentPermissions: '/api/v1/admin/hr/departments/set-permissions/'+this.departmentId,
        groups: [],
        users: [],
        designations: [],
        user_head_department: '', // user
        permissionError: '',

        spinnerAction: false,
        spinnerUpdateDepart: false,

        form: new Form({
            id: '',
            user_head_department: '', // user
            department_name: '',
            designations: [],
        }),

        permissionsForm: new Form({
            permissions: [],
            department_head: []
        }),
      }
    },
    watch: {
        'form': {
            handler: function(items) {
                this.permissionsForm.department_head = items.user_head_department
            },
            deep: true
        },
    },
    methods: {
        async getPermissions() {
            await axios.get(this.urlGetPermissions).then(response => {
                if (response.status === 200) {
                    const data = response.data
                    // console.log(data.data);
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
        getDepartment() {
            axios.get(this.urlGetDepartment).then(response => {
                const data = response.data;
                // console.log(data);
                this.form.fill(data.department);
                this.user_head_department = data.department.department_head_account;
                this.form.user_head_department = data.department.department_head_account;
                this.form.designations = data.designations;

                this.permissionsForm.permissions = data.permissions
            });
        },
        getDesignations() {
            axios.get(this.urlGetDesignations).then(response => {
                const data = response.data.data
                data.forEach(element => {
                    this.designations.push(element);
                });
            });
        },
        getAccountDetails() {
            axios.get(this.urlGetAccountDetails).then(response => {
                const data = response.data.data
                
                // Fetch Unbanned Users
                var result = [];
                data.forEach(element => {
                    for(let x of Object.entries(element)) {
                        var item = {user_id: x[0], fullname: x[1]}
                        result.push(item);
                    }
                });
                this.users = [...result]
                // Fetch Unbanned Users

            });
        },
        userFullname(user_head_department) {
            return `${user_head_department.fullname}`
        },
        addAllPermisssions() {
            let permissions = []
            this.groups.forEach(group => {
                group.permissions.forEach(permission => {
                    permissions.push(permission.name)
                })
            })
            this.permissionsForm.permissions = permissions
        },
        toggleAllPermisssions() {
            let permissions = []
            let oldPermissions = [...this.permissionsForm.permissions]
            this.groups.forEach(group => {
                group.permissions.forEach(permission => {
                    if (oldPermissions.indexOf(permission.name) == -1) {
                        permissions.push(permission.name)
                    }
                })
            })
            this.permissionsForm.permissions = permissions
        },
        togglePermisssionsInGroup(permissionsGroup) {
            let oldPermissions = [...this.permissionsForm.permissions]
            permissionsGroup.forEach(permission => {

                if (oldPermissions.indexOf(permission.name) != -1) {
                    var index = oldPermissions.indexOf(permission.name);
                    oldPermissions.splice(index, 1);
                }else{
                    oldPermissions.push(permission.name)
                }

            })
                this.permissionsForm.permissions = oldPermissions
        },
        addAllPermisssionsInGroup(permissionsGroup) {
            let oldPermissions = [...this.permissionsForm.permissions]
            permissionsGroup.forEach(permission => {
                if (oldPermissions.indexOf(permission.name) == -1) {
                    oldPermissions.push(permission.name)
                }
            })
            this.permissionsForm.permissions = oldPermissions
        },

        // Form Submission Department
        updateDepartment(){
            this.spinnerUpdateDepart = true,

            this.form.put(this.urlGetDepartment).then(data => {
                if (data.status === 202) {
                    setTimeout(() => {
                        window.location.href = "/admin/hr/departments/list";
                    }, 500);
                }
            }).catch(error => {
                console.log(error.response);
            })
        },
        createDepartment(){
            this.spinnerUpdateDepart = true,

            this.form.post('/api/v1/admin/hr/departments').then(data => {
                this.spinnerUpdateDepart = false;
                if (data.status === 201) {
                    const result = data.data.data
                    // console.log(result);
                    this.form.fill(result);
                    this.form.user_head_department = result.department_head_account
                    this.form.designations = [...result.department_designations]
                }
            }).catch(error => {
                console.log(error.response);
            })
        },

        // Form Submission Permissions
        departmentPermissions(){
            this.spinnerAction = true;
            if (!this.departmentId) { // In Case of Create a new Department
                this.urlSetDepartmentPermissions = '/api/v1/admin/hr/departments/set-permissions/'+this.form.id;
            }
            this.permissionsForm.post(this.urlSetDepartmentPermissions)
                .then(data => {
                    this.spinnerAction = false;
                    this.permissionError = "";

                    if(this.departmentId) this.updateDepartment()
                    setTimeout(() => {
                        window.location.href = "/admin/hr/departments/list";
                    }, 500);

                    // console.log(data);
                }).catch(error => {
                    this.spinnerAction = false;
                    this.permissionError = "Department Head is Required"
                    console.log(error);
                });

        },

        backLocation() {
            window.location.href = "/admin/hr/departments/list";
        }
    },
    mounted() {
        i18n.locale = this.langKey;
        // console.log(i18n.locale);
        if (this.departmentId) {
            this.getDepartment();
        }
        this.getPermissions();
        this.getDesignations();
        this.getAccountDetails();

    },
}
