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
    .input-transparent {
        outline: 0;
        border: 0 !important;
        background: 0 0;
        padding: 3px;
        margin-left: 3px;
        background-color: transparent !important;
    }
    .input-transparent:focus {
        box-shadow: none;
    }
    .pointer {
        cursor: pointer;
    }
</style>
<template>
    <div class="">
        <div class="my-3 d-flex justify-content-around">
            <div class="">


                <div class="d-flex justify-content-between align-items-center form-group">
                    <div class="col-auto">
                        <label for="refNo" class="col-form-label required" v-text="$t('purchase.fields.ref_no')"></label>
                    </div>
                    <div class="col-auto">
                        <input type="text" v-model="form.ref_no" class="form-control">
                    </div>
                </div>

                <supplier-modal :form="form">
                </supplier-modal>

                <div class="d-flex justify-content-between align-items-center form-group">
                    <div class="col-auto">
                        <label class="col-form-label" v-text="$t('purchase.fields.purchase_date')"></label>
                    </div>
                    <div class="col-auto">
                        <input type="text" v-model="form.purchase_date" class="form-control">
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center form-group">
                    <div class="col-auto">
                        <label class="col-form-label" v-text="$t('purchase.fields.due_date')"></label>
                    </div>
                    <div class="col-auto">
                        <input type="text" v-model="form.due_date" class="form-control">
                    </div>
                </div>

            </div>
            <!-- End First Half Screen -->
            <div class="">

                <div class="d-flex justify-content-between align-items-center form-group">
                    <div class="col-auto">
                        <label class="col-form-label" v-text="$t('purchase.fields.sales_agent')"></label>
                    </div>
                    <div class="col-auto">
                        <multiselect
                            v-model="form.sales_agent"
                            :options="users"
                            :searchable="true"
                            :close-on-select="true"
                            :show-labels="false"
                            label="fullname"
                            track-by="user_id"
                            :placeholder="$t('sidebar.choose_user')"
                            :preselect-first="true"
                        ></multiselect>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center form-group">
                    <div class="col-auto">
                        <label class="col-form-label" v-text="$t('purchase.fields.stock')"></label>
                    </div>
                    <div class="col-auto mt-2">
                        <div class="input-group">
                            <div class="form-group">
                                <input type="radio" v-model="form.stock" value="Yes" aria-label="Radio button for following text input">
                                <label>Yes</label>
                            </div>
                            <div class="form-group ml-1">
                                <input type="radio" v-model="form.stock" value="No" aria-label="Radio button for following text input">
                                <label>No</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center form-group">
                    <div class="col-auto">
                        <label class="col-form-label" v-text="$t('purchase.fields.discount_type')"></label>
                    </div>
                    <div class="col-auto">
                        <select v-model="form.discount_type" class="form-control">
                            <option value="before_tax" v-text="$t('purchase.fields.before_tax')"></option>
                            <option value="after_tax" v-text="$t('purchase.fields.after_tax')"></option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center form-group">
                    <div class="col-auto">
                        <label class="col-form-label" v-text="$t('purchase.fields.notes')"></label>
                    </div>
                    <div class="col-auto">
                        <textarea v-model="form.notes" class="form-control"></textarea>
                    </div>
                </div>

            </div>
            <!-- End Second Half Screen -->

        </div>

        <!-- Items -->
        <div class="d-flex justify-content-between">
            <div class="col-md-6">
                    {{form.items}}
                    <!-- {{selectedItem}} -->
                <multiselect
                    :options="items"
                    v-model="selectedItem"
                    :searchable="true"
                    :close-on-select="true"
                    :show-labels="false"
                    label="name"
                    track-by="id"
                    :placeholder="$t('sidebar.choose_item')"
                    :preselect-first="true"
                    @input="addNewPurchaseItem(selectedItem)"
                ></multiselect>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center form-group">
                    <div class="col-auto">
                        <label class="col-form-label" v-text="$t('purchase.fields.show_qty_as')"></label>
                    </div>
                    <div class="col-auto mt-2">
                        <div class="input-group">
                            <div class="form-group">
                                <input type="radio" name="qtyAs" checked @click="showQtyAs('qty')" aria-label="Radio button for following text input">
                                <label v-text="$t('purchase.fields.quantity_as_qty')"></label>
                            </div>
                            <div class="form-group ml-1">
                                <input type="radio" name="qtyAs" @click="showQtyAs('hours')" aria-label="Radio button for following text input">
                                <label v-text="$t('purchase.fields.quantity_as_hours')"></label>
                            </div>
                            <div class="form-group ml-1">
                                <input type="radio" name="qtyAs" @click="showQtyAs('qty_hours')" aria-label="Radio button for following text input">
                                <label v-text="$t('purchase.fields.quantity_as_qty_hours')"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .........Items......... -->

        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">{{$t('items.fields.name')}}</th>
                <th scope="col">{{$t('items.fields.description')}}</th>
                <th scope="col" v-text="quantityAs"></th>
                <th scope="col">{{$t('items.fields.price')}}</th>
                <th scope="col">{{$t('items.fields.tax_rate')}}</th>
                <th scope="col">{{$t('items.fields.total')}}</th>
                <th scope="col">{{$t('global.action')}}</th>
                </tr>
            </thead>
            <tbody>
                <tr data-row-id="" v-for="(item, index) in form.items" :key="index">

                <!-- <tr> -->
                    <!-- <th scope="row">1</th> -->
                    <th>
                        <textarea class="form-control" v-model="item.name" @keyup="newItemAdded(item)"></textarea>
                    </th>
                    <td>
                        <textarea class="form-control" v-model="item.description"></textarea>
                    </td>
                    <td>
                        <input class="form-control" type="number" v-model="item.quantity" @change="newItemAdded(item)">
                        <input class="form-control input-transparent" :placeholder="$t('items.fields.unit_cost')" type="text" v-model="item.unit_cost">
                    </td>
                    <td>
                        <input class="form-control" type="number" v-model="item.total_cost_price" @change="newItemAdded(item)">
                    </td>
                    <td>
                        <multiselect
                            :options="taxRates"
                            v-model="form.item_tax_rate"
                            :searchable="true"
                            :close-on-select="true"
                            :show-labels="false"
                            label="name"
                            track-by="id"
                            :placeholder="$t('sidebar.choose_tax_rate')"
                            :preselect-first="true"
                            :multiple="true"
                            :taggable="true"
                            @input="addTax(form.item_tax_rate, index)"
                        ></multiselect>
                            <!-- @tag="addTax(form.item_tax_rate, index)" -->
                    </td>
                    <td>
                        <input class="form-control input-transparent" type="number" disabled v-model="item.total">
                    </td>
                    <td>
                        <i class="fas fa-check text-white p-1" :class="activeRowAddition" @click="addItemToModel(item)"></i>
                    </td>
                </tr>
            </tbody>
        </table>
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
                urlGetAccountDetails: '/api/v1/admin/hr/account-details',
                urlGetItems:          '/api/v1/admin/materialssuppliers/items',
                urlGetTaxRates:       '/api/v1/admin/materialssuppliers/tax-rates',

                users: [],
                items: [],
                taxRates: [],
                quantityAs: this.$t('purchase.fields.quantity_as_qty'),

                spinnerAction: false,
                spinnerLoad: false,

                activeRowAddition: 'bg-secondary',

                selectedItem: [],

                dataItems: {
                            name:      '',
                            description:      '',
                            quantity:       '1',
                            total_cost_price: '',
                            item_tax_total: '', // Calculated
                            total_cost:     '',
                            unit_cost:      '',
                            total:          '',
                        },

                form: new Form({
                    ref_no:        '',
                    supplier:      '',
                    purchase_date: '',
                    due_date:      '',
                    sales_agent:   '',
                    stock:         '',
                    discount_type: '',
                    notes:         '',
                    items: [
                        {
                            name:      '',
                            description:      '',
                            quantity:       '1',
                            total_cost_price: '',
                            item_tax_total: '', // Calculated
                            total_cost:     '',
                            unit_cost:      '',
                            total:          '',
                        }
                        // this.dataItems
                    ],
                    item_tax_rate:  '',

                }),
            }
        },
        methods: {
            getAccountDetails() {
                axios.get(this.urlGetAccountDetails).then(response => {
                    const data = response.data.data
                    this.users = data
                });
            },
            getItems() {
                axios.get(this.urlGetItems).then(response => {
                    const data = response.data.data
                    this.items = data
                });
            },
            getTaxRates() {
                axios.get(this.urlGetTaxRates).then(response => {
                    const data = response.data.data
                    this.taxRates = data
                });
            },
            showQtyAs(val) {
                this.quantityAs = this.$t('purchase.fields.quantity_as_'+val)
            },
            addNewPurchaseItem(item) { // Add New Item Row To Proposal
                this.form.items.splice(0, 1);
                this.form.items.unshift(item)
                this.newItemAdded(item)
            },
            addTax (taxItem, index) {
                // console.log(taxItem);
                const tax = {
                    name: taxItem,
                }
                // console.log(tax);
                // console.log(index);
                // console.log(this.form.items);
                // this.form.items[0].item_tax_rate = tax
                console.log(this.form.items[index]);
                // this.form.item_tax_rate.unshift(tax)
                // this.form.item_tax_rate.push(tax)
            },
            newItemAdded(item) { // Set the input data values in row
                if(item.name && item.quantity && item.total_cost_price != ''){
                    this.activeRowAddition = 'bg-primary pointer'
                }
            },
            addItemToModel(item) { // Add row item to model
                this.form.items.unshift(this.dataItems)
                // this.form.items.push(item);
            }
        },
        // watch: {
        //     'form': {
        //         handler: function(items, index) {
        //             const tax = {
        //                 name: items,
        //             }
        //             console.log("fslidg h");
        //             console.log(index);
        //             console.log(items);
        //             console.log(tax);
        //             this.form.item_tax_total = tax
        //         },
        //         deep: true
        //     }
        // },
        mounted() {
            i18n.locale = this.langKey;
            this.getAccountDetails();
            this.getItems();
            this.getTaxRates();
        }
    }
</script>
