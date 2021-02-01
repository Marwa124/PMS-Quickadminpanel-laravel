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
    <form @submit.prevent="purposalSubmit" @keydown="form.onKeydown($event)">
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
                    <!-- {{form.items}} -->
                    {{selectedItem}}
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

                    deselect-label="Can't remove this value"
                    :allow-empty="false"
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
                <tr v-for="(item, index) in form.items" :key="index">
                    <th>
                        <textarea class="form-control" v-model="item.name" @keydown="newItemAdded(item, index)"></textarea>
                    </th>
                    <td>
                        <textarea class="form-control" v-model="item.description"></textarea>
                    </td>
                    <td>
                        <!-- focusout -->
                        <input class="form-control" type="number" v-model="item.quantity" @keypress="newItemAdded(item, index)">
                        <input class="form-control input-transparent" :placeholder="$t('items.fields.unit_cost')" type="text" v-model="item.unit_cost">
                    </td>
                    <td>
                        <input class="form-control" type="number" v-model="item.total_cost_price" @keypress="newItemAdded(item, index)">
                    </td>
                    <td>
                        <multiselect
                            :options="taxRates"
                            v-model="item.taxes"
                            :searchable="true"
                            :close-on-select="true"
                            :show-labels="false"
                            label="rate_percent"
                            track-by="id"
                            :placeholder="$t('sidebar.choose_tax_rate')"
                            :preselect-first="false"
                            :multiple="true"
                            :taggable="true"
                            @input="addTax(item.taxes, index)"
                            @remove="toggleUnSelectMarket"
                        ></multiselect>
                            <!-- @tag="addTax(form.item_tax_rate, index)" -->
                    </td>
                    <td>
                        <input class="form-control input-transparent" type="number" disabled v-model="item.total">
                    </td>
                    <td>
                        <div v-if="form.items[index].activeRowAddition == 'bg-danger pointer'">
                            <i class="fas fa-trash-alt text-white p-1" :class="form.items[index].activeRowAddition" @click="removeItemRow(item, index)"></i>
                        </div>
                        <div v-else>
                            <i class="fas fa-check text-white p-1" :class="form.items[index].activeRowAddition" @click="addItemToModel(item, index)"></i>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table"> <!-- Total -->
            <tbody class="text-right">
                <tr>
                    <td>Sub Total: </td>
                    <td>
                        <div><input class="form-control input-transparent text-right"
                            type="number" disabled v-model="form.sub_total" step="0.01"></div>
                    </td>
                </tr>
                <tr>
                    <td class="d-flex float-right">
                        <div>Discount (%)</div>
                        <div><input type="number" class="form-control" v-model="form.discount" step="0.01"></div>
                    </td>
                    <td>
                        <div><input class="form-control input-transparent text-right"
                                type="number" disabled v-model="form.discount_amount" step="0.01"></div>
                    </td>
                </tr>
                <tr data-row-id="" v-for="(tax, i) of form.taxRate_total" :key="i">
                    <td v-if="tax.value > 0.00">
                        <div><input class="form-control input-transparent text-right"
                            type="text" disabled v-model="tax.name"></div>
                    </td>
                    <td v-if="tax.value > 0.00">
                        <div><input class="form-control input-transparent text-right"
                            type="number" disabled v-model="tax.value" step="0.01"></div>
                    </td>
                </tr>
            </tbody>
        </table> <!-- Total -->
          <button :disabled="form.busy" type="submit" class="btn btn-primary">Log In</button>
    </form>
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
                selectedItem: '',


                rowIndex: 1,

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
                            // name:      '',
                            // description:    '',
                            quantity:       '1',
                            total_cost_price: '',
                            // item_tax_total: '', // Calculated
                            // total_cost:     '',
                            // unit_cost:      '',
                            total:          '',
                            activeRowAddition: 'bg-secondary',
                            taxes : []
                        },
                    ],
                    sub_total: '',
                    discount_amount: '',
                    discount: '',
                    taxRate_total: {},

                    removedTax: '',
                    AddedTax: ''
                }),
            }
        },
        methods: {
            purposalSubmit() {
                this.form.post('/admin/materialssuppliers/purchases')
                  .then(({ data }) => { console.log(data) })
            },
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
                this.form.items[0].id            = item.id,
                this.form.items[0].name          = item.name,
                this.form.items[0].description   = item.description,
                this.form.items[0].quantity      = item.quantity,
                this.form.items[0].total_cost_price = item.total_cost_price,
                this.form.items[0].item_tax_total = item.item_tax_total, // Calculated
                this.form.items[0].total_cost     = item.total_cost,
                this.form.items[0].unit_cost      = item.unit_cost,
                this.form.items[0].total          = item.total,
                // this.form.items[0].activeRowAddition = 'bg-primary pointer',
                this.form.items[0].taxes = item.taxes ?? [],
                    console.log('item.taxes     '+ this.form.items[0].taxes);

                this.newItemAdded(item)
            },
            toggleUnSelectMarket(val) {
                this.form.removedTax = [val.name, val.rate_percent]  // Get the (removed Tax object) Stored into removedTax
            },
            addTax (taxItem, index) {
                let selectedTax = [...taxItem];

                let addedTaxObj = selectedTax[selectedTax.length-1]
                this.form.AddedTax = [addedTaxObj.name, addedTaxObj.rate_percent] // Get the (last added Tax object) Stored into AddedTax

                let taxArray = [];
                selectedTax.forEach(element => {
                    taxArray.push(element);
                    // this.form.taxRate_total.push([element.name, 0])
                    this.form.taxRate_total[element.name] = {name: element.name, value: 0}
                    // this.form.taxRate_total.push([element.name,{name: element.name, value: 0}])

                    // console.log('this.form.taxRate_total    '+ this.form.taxRate_total[0].name);
// PREVENT DUBLICATING OBJECT
                    // *****prevent object duplication inside an array
                    // const uniqueAddresses = Array.from(new Set(this.form.taxRate_total.map(a => a.name)))
                    //     .map(name => {
                    //     return this.form.taxRate_total.find(a => a.name === name)
                    // })
                    // this.form.taxRate_total = uniqueAddresses;
                    // *****prevent object duplication inside an array
                });

                this.form.items[index].taxes = taxArray;
            },
            newItemAdded(item, index) { // Set the input data values in row
                if(item.name && item.quantity && item.total_cost_price != ''){
                    this.form.items[0].activeRowAddition = 'bg-primary pointer'
                }
            },
            addItemToModel(item, index) { // Add row item to model
                item.rowIndex = this.rowIndex ++

                this.form.items.unshift({
                    name           : '',
                    description    : '',
                    quantity       : '1',
                    total_cost_price : '',
                    item_tax_total : '', // Calculated
                    total_cost     : '',
                    unit_cost      : '',
                    total          : '',
                    activeRowAddition : 'bg-secondary',
                    taxes          : [],
                })
                this.form.items.forEach( (element, index) => {
                    if (index > 0) {
                        element.activeRowAddition = 'bg-danger pointer'
                    }
                });
            },
            removeItemRow(item, index) {
                this.form.items.splice(index, 1);
            },
            // calculateTotalTaxes(taxesArray) {
            calculateTotalTaxes(subTotal) {


                  
            



                // if(typeof taxesArray[0] == 'string') {
                //     totalTaxRate.find(formTaxRate => {
                //         if(taxesArray[0] === formTaxRate.name) { // Hashing Those lines prevent infinite looping
                //             formTaxRate.value += parseFloat((parseInt(totalRowPrice) * (taxesArray[1] / 100)).toFixed(2))
                //         }
                //     })
                //     taxesArray = ''
                // }else {
                //     console.log('AAAAAAAAA ' );
                //     totalTaxRate.find(formTaxRate => {

                //         // taxesArray.map(x => {
                //         //     if(x.name === formTaxRate.name) { // Hashing Those lines prevent infinite looping
                //         //         formTaxRate.value += parseFloat((parseInt(totalRowPrice) * (x.rate_percent / 100)).toFixed(2))
                //         //     }
                //         // })


                //         // for(let [x, y] of Object.entries(taxesArray)) {
                //         //     console.log('AAAAAAAAA ' +x);
                //         //     console.log('YYYYYYYYYYY ' +y);

                //         //     if(arr.name === formTaxRate.name) { // Hashing Those lines prevent infinite looping
                //         //         formTaxRate.value += parseFloat((parseInt(totalRowPrice) * (arr.rate_percent / 100)).toFixed(2))
                //         //     }
                //         // }
                //     })
                //     // taxesArray = ''
                // }
            },
        },
        watch: {
            'form': {
                handler: function(form) {

                    var totalRow = [];
                      if(form.items.length > 0) {
                        var logX = form.items.map(tax => {
                            tax.total = tax.total_cost_price * tax.quantity
                        });


                        console.log('Taxcccccc   '+ form.removedTax);                  


                        let subTotal = 0;
                        var result = form.items.reduce(function(accum, currentVal) {
                            totalRow.push(currentVal.total)
                            
                            if(parseInt(currentVal.total)) subTotal += parseInt(currentVal.total);

                            return subTotal;
                        }, {});
                        form.sub_total = result

                        form.discount_amount = form.discount * subTotal * (1/100)




                // console.log(totalRow);
                        var formTaxes = [];
                        var taxName = [];
                        form.items.forEach(element => {
                            var indexRow = element.rowIndex;

                            if(indexRow) {
                                console.log(element.rowIndex);
                                console.log(form.items[indexRow].total);






                                form.items[indexRow].taxes.map(tax => {
                                    taxName[tax.name] = form.sub_total * (tax.rate_percent / 100)
                                    
                                    // form.taxRate_total.find(formTaxRate => {
                                        if(tax.name) { // Hashing Those lines prevent infinite looping
                                            form.taxRate_total[tax.name].value = parseFloat((taxName[tax.name]).toFixed(2))
                                    console.log(form.taxRate_total[tax.name].value);
                                        }
                                    // })

                                });

                            }
                        });


                        // form.items[this.fetchRowIndex].taxes.map(tax => {

                        //     console.log(tax.name);
                        // });



                            // console.log(tax.name);


                    }
                },
                deep: true
            }
        },
        mounted() {
            i18n.locale = this.langKey;
            this.getAccountDetails();
            this.getItems();
            this.getTaxRates();
        }
    }
</script>
