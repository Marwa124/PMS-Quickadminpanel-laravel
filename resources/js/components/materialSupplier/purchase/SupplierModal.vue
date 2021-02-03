<template>
    <div>
        <div class="d-flex justify-content-between align-items-center form-group">
            <div class="col-auto">
                <label for="supplier" class="col-form-label required" v-text="$t('suppliers.supplier')"></label>
            </div>
            <div class="col-auto d-flex">
                <multiselect
                    v-model="form.supplier_id"
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
                <div class="" style="align-self:center; cursor:pointer;">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#supplierModal">
                        <i class="fas fa-plus"></i>
                    </button>


                    <div style="position: relative;">
                        <alert-success :form="supplierForm" message="Your changes have been saved!"></alert-success>
                        <alert-errors :form="supplierForm" message="There were some problems with your input."></alert-errors>
                    </div>

                    <!-- Modal -->
                    <form @submit.prevent="supplierNew" @keydown="supplierForm.onKeydown($event)">

                        <div class="modal fade" id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="supplierModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="supplierModalLabel" v-text="$t('global.new')+$t('suppliers.supplier')"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <label class="col-form-label required" v-text="$t('suppliers.fields.name')"></label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" v-model="supplierForm.name" class="form-control">
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <label class="col-form-label required" v-text="$t('suppliers.fields.mobile')"></label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" v-model="supplierForm.mobile" class="form-control">
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <label class="col-form-label" v-text="$t('suppliers.fields.phone')"></label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" v-model="supplierForm.phone" class="form-control">
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <label class="col-form-label required" v-text="$t('suppliers.fields.email')"></label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="email" v-model="supplierForm.email" class="form-control">
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <label class="col-form-label" v-text="$t('suppliers.fields.address')"></label>
                                    </div>
                                    <div class="col-auto">
                                        <textarea v-model="supplierForm.address" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button class="btn btn-primary btn-sm buttonload supplierFormBtn"
                                    type="submit" :disabled="supplierForm.busy">
                                    <i v-if="spinnerLoad" class="fa fa-spinner fa-spin"></i>
                                    <span v-text="$t('global.create')"
                                    ></span>
                                </button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
            <has-error :form="supplierForm" field="supplier"></has-error>
        </div>
    </div>
</template>

<script>
import { Form, HasError, AlertErrors, AlertSuccess } from 'vform'
import Multiselect from 'vue-multiselect'

export default {
    components: {HasError, AlertErrors, AlertSuccess, Multiselect},
    props: ['form'],
    data() {
        return {
            urlGetSuppliers:   '/api/v1/admin/materialssuppliers/suppliers',
            suppliers: [],
            supplierForm: new Form({    // Supplier Form
                name:    '',
                mobile:  '',
                phone:   '',
                email:   '',
                address: '',
            }),
            spinnerLoad: false,
        }
    },
    methods: {
        getSuppliers() {
            axios.get(this.urlGetSuppliers).then(response => {
                const data = response.data.data;
                var result = data.map(item => {
                    return {
                        id: item.id,
                        name: item.name
                    }
                })
                this.suppliers = result;
            });
        },
        // Create a new Supplier Form Subbmission
        supplierNew(){
            // console.log(this.rates);
            this.spinnerLoad = true;
            var self = this;
            $.ajax({
                url: this.urlGetSuppliers,
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: this.supplierForm,
                success: function (data) {
                    self.suppliers.push(data.data)
                    // Reset the alert values if exists
                    document.querySelector(".alert-danger") ? document.querySelector(".alert-danger").remove() : '';
                    // **** Reset the alert values
                    this.spinnerLoad = false;
                    // Close The modal after success create
                    let supplierBtn = document.querySelector('.supplierFormBtn');
                    supplierBtn.classList.add('close');
                    supplierBtn.setAttribute('data-dismiss', 'modal');
                    supplierBtn.click()
                    supplierBtn.classList.remove('close');
                    supplierBtn.removeAttribute('data-dismiss');
                },
                error: function(error) {
                    console.log(error.responseJSON.errors);
                    var errorObj = error.responseJSON.errors;
                    var result = Object.keys(errorObj).map((key) => [(key), errorObj[key]]);

                    result.forEach(elem => {
                        let appentToInput = document.querySelector('#supplierModal .modal-body')
                        // Reset the alert values if exists
                        document.querySelector(".alert-danger") ? document.querySelector(".alert-danger").remove() : '';
                        // **** Reset the alert values

                        var error = document.createElement("div");
                        error.className = "form-group alert alert-danger"
                        appentToInput.append(error)
                        elem.forEach(val => {
                            error.innerHTML = val
                        });
                    });
                }
            });
        },

    },
    mounted() {
        this.getSuppliers();
    },
}
</script>
