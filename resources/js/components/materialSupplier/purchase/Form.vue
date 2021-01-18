<style>
    hr{
        background-color: rgb(121, 116, 116);
        width: 70px;
        transform: rotate(90deg);
    }
    .col-auto .required::after {
        content: " *";
        color: red;
    }
</style>
<template>
    <div class="container">
        <div class="row my-3">
            <div class="col-md-6">


                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="refNo" class="col-form-label required" v-text="$t('cruds.purchase.fields.ref_no')"></label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="refNo" class="form-control">
                    </div>
                </div>

                <!-- department_head -->
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="supplier" class="col-form-label required" v-text="$t('cruds.purchase.fields.supplier')"></label>
                    </div>
                    <div class="col-auto">
                        <multiselect 
                            v-model="form.supplier" 
                            :options="suppliers" 
                            :searchable="true" 
                            :close-on-select="true" 
                            :show-labels="false" 
                            label="name" 
                            track-by="id"
                            :placeholder="$t('sidebar.choose_supplier')"
                            :preselect-first="true"
                        ></multiselect>
                            <!-- :custom-label="userFullname" -->
                    </div>
                    <has-error :form="form" field="supplier"></has-error>
                </div>


            </div>
            <!-- End First Half Screen -->
            <div class="col-md-6"></div>
            <!-- End Second Half Screen -->

        </div>
    </div>
</template>

<script>
    import { Form, HasError, AlertErrors, AlertSuccess } from 'vform'
    import i18n from '../../../plugins/i18n';

    import Multiselect from 'vue-multiselect'

    export default {
        components: {HasError, AlertErrors, AlertSuccess, Multiselect},
        props: ['langKey', 'departmentId'],
        data() {
            return {
                urlGetSuppliers:   '/api/v1/admin/materialssuppliers/suppliers',

                suppliers: [],
                designations: [],

                spinnerAction: false,
                spinnerUpdateDepart: false,

                form: new Form({
                    ref_no: '',
                    supplier: '', // user
                    department_name: '',
                    designations: [],
                }),
            }
        },
        methods: {
            getSuppliers() {
                axios.get(this.urlGetSuppliers).then(response => {
                    const data = response.data;
                    console.log(data);
                    this.suppliers = data.department.department_head_account;
                });
            },
            supplierName(name) {
                return `${name.fullname}`
            },
        },
        mounted() {
            i18n.locale = this.langKey;

            this.getSuppliers();
            console.log('Component mounted.')
        }
    }
</script>