<template>
    <div>
        <!-- info -->
        <div class="card">
            <h5 class="card-header bg-dark text-white">Employee Information</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="d-flex justify-content-flex-end">
                                <label for="designation_id" v-text="$t('cruds.evaluation.fields.name')"></label>
                                <input class="form-control w-75 d-flex ml-auto" type="text" name="user_name" disabled :value="user.fullname">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="d-flex justify-content-flex-end">
                                <label for="designation_id" v-text="$t('cruds.evaluation.fields.job_title')"></label>
                                <input class="form-control w-75 d-flex ml-auto" type="text" name="designation" disabled :value="designation.designation_name">
                             </div>
                        </div>

                        
                        <div class="form-group">
                            <div class="d-flex justify-content-flex-end">
                                <label for="designation_id" v-text="$t('cruds.evaluation.fields.department')"></label>
                                <input class="form-control w-75 d-flex ml-auto" type="text" name="department" disabled :value="departmentTitle.department_name">
                             </div>
                        </div>

                        
                        <div class="form-group">
                            <div class="d-flex justify-content-flex-end">
                                <label for="designation_id" v-text="$t('cruds.evaluation.fields.period')"></label>
                                <input class="form-control w-75 d-flex ml-auto" type="text" name="period" required :placeholder="$t('cruds.evaluation.fields.review_period')">
                             </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="d-flex justify-content-flex-end">
                                <label for="designation_id" v-text="$t('cruds.evaluation.fields.employee_id')"></label>
                                <input class="form-control w-75 d-flex ml-auto" type="text" name="date" :value="user.employment_id">
                             </div>

                        </div>

                        <div class="form-group">
                            <div class="d-flex justify-content-flex-end">
                                <label for="designation_id" v-text="$t('cruds.evaluation.fields.date')"></label>
                                <input class="form-control w-75 d-flex ml-auto" type="text" name="date" disabled :value="month+'-'+year">
                             </div>
                        </div>

                        <div class="form-group">
                            <div class="d-flex justify-content-flex-end">
                                <label for="designation_id" v-text="$t('cruds.evaluation.fields.manager')"></label>
                                <input class="form-control w-75 d-flex ml-auto" type="text" name="manager" disabled :value="departmentHead.fullname">
                             </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>   
        <!-- ...info -->


        <!-- Ratings -->
        <div class="card">
            <h5 class="card-header bg-dark text-white">Ratings</h5>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">
                                <span class="addRating">
                                    <i class="fas fa-plus-square" style="cursor:pointer;" @click="addRow()"></i>
                                </span>
                            </th>
                            <th scope="col">1 = Poor</th>
                            <th scope="col">2 = Fair </th>
                            <th scope="col">3 = Satisfactory</th>
                            <th scope="col">4 = Good</th>
                            <th scope="col">5 = Excelent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-row-id="" v-for="(item, index) in rates" :key="index">
                            {{item}}
                            <!-- <th scope="col">
                                <span class="addRating">
                                    <i class="fas fa-plus-square" style="cursor:pointer;" @click="addRow(item)"></i>
                                </span>
                            </th> -->
                            <td>
                                <div class="d-flex">
                                    <span class="text-white bg-danger d-flex align-self-center p-1 mr-2" style="border-radius:2px">
                                        <i class="fas fa-trash-alt" @click="removeRow(index)"></i>
                                    </span>
                                    <input v-model="item.name" type="text" class="form-control d-bock">
                                </div>
                                <div class="d-flex mt-1">
                                     <td>Comments</td>
                                    <!-- <td> -->
                                        <input v-model="item.comment" type="text" class="form-control d-block">
                                    <!-- </td> -->
                                </div>
                            </td>
                            <td>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <input value="1" :name="'rate['+index+']'" v-model="item.rate" type="radio" aria-label="Radio button for following text input">
                                    {{item.rate}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <input value="2" :name="'rate['+index+']'" v-model="item.rate" type="radio" aria-label="Radio button for following text input">
                                    {{item.rate}}

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <input value="3" :name="'rate['+index+']'" v-model="item.rate" type="radio" aria-label="Radio button for following text input">
                                    {{item.rate}}

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <input value="4" :name="'rate['+index+']'" v-model="item.rate" type="radio" aria-label="Radio button for following text input">
                                    {{item.rate}}

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <input value="5" :name="'rate['+index+']'" v-model="item.rate" type="radio" aria-label="Radio button for following text input">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Overall Rating</td>
                            <td colspan="5">
                                <!-- <input type="text" class="form-control" v-model="overallAvg"> -->
                                <input type="text" class="form-control" :value="overallAvg">
                            </td>
                        </tr>
                        <!-- <tr v-for="(rate, index) in rates" :key="index">

                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- ...Ratings -->

        <!-- Evaluation -->
        <div class="card">
            <h5 class="card-header bg-dark text-white">Evaluation</h5>
            <div class="card-body">
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <!-- ...Evaluation -->

        <!-- Review -->
        <div class="card">
            <h5 class="card-header bg-dark text-white">Verification of Review</h5>
            <div class="card-body">
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <!-- ...Review -->

    </div>
</template>

<script>

import { Form, HasError, AlertErrors, AlertSuccess } from 'vform'
import i18n from '../../plugins/i18n';

export default {
    props: ['langKey', 'user', 'designation', 'departmentTitle', 'departmentHead'],
    data(){
        return {
            urlGetEvaluationRatings: '/api/v1/admin/hr/evaluations',

            // Row Data
            rates: {},

            // Form Data
            form: new Form({
                id: '',
                name: '', // user
                rate: '',
                comment: '',
            }),

            overallAvg: '',
            computeRate: '',
            year: '',
            month: '',
        }
    },
    watch: {
        'rates': {
            handler: function(items) {
                var rateVals = [];
                items.forEach(item => {
                    console.log('xxxxxx' + item.rate)
                    var count = 0;
                    if(item.rate != '') {
                        count += 1;
                        console.log('The list of colours has changed!');
                        rateVals.push(item.rate);
    
                        var sumRates = rateVals.reduce((current, previous) => {
                            return parseInt(current) + parseInt(previous);
                        }, 0)
                        console.log(rateVals)
                        console.log(sumRates)
                        // console.log(items.length);
                        console.log(count);
                        return this.overallAvg = sumRates / count; 
                    }
                });
            },
            deep: true
        },
    },
    methods: {
        //Fetch Ratings From db
        getRatings(){
            axios.get(this.urlGetEvaluationRatings).then(response => {
                const data = response.data.data
                this.rates = data;
            });
        },

        addRow(){
            this.rates.push({
                name: '',
                rate: '',
                comment: '',
                // poor: '', 
                // fair: '',
                // satisfactory: '',
                // good: '',
                // excellent: '', 
            });
        },
        removeRow(index){
            this.rates.splice(index,1); 
            // this.rates.splice(index + 1, 0, {});

        },
        onSubmit(){
            this.form.post('/api/v1/admin/hr/evaluations').then(data => {
                if (data.status === 201) {
                    const result = data.data.data
                    this.form.fill(result);
                }
            }).catch(error => {
                console.log(error.response);
            })
        },
        getDate(){
            var d = new Date();
            this.month = d.getMonth() + 1;
            this.year  = d.getFullYear();
        },
    },
    mounted() {
        i18n.locale = this.langKey;
        
        this.getDate();
        this.getRatings();

    }
}
</script>