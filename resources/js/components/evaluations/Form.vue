<template>
    <div>

        <div v-if="evaluation != ''">
            <button v-print ref="evaluationPrintBtn" class="btn btn-sm btn-primary">Print Evaluation</button>
        </div>

        <div style="position: relative;">
            <alert-success :form="rates" message="Your changes have been saved!"></alert-success>
            <alert-errors :form="rates" message="There were some problems with your input."></alert-errors>
        </div>

        <section>
            <form @submit.prevent="rateUserSubmission" @keydown="rates.onKeydown($event)">

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
                                        <!-- required  -->
                                        <input class="form-control w-75 d-flex ml-auto" type="text" name="period"
                                        v-model="rates.period"
                                        :placeholder="$t('cruds.evaluation.fields.review_period')">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="d-flex justify-content-flex-end">
                                        <label for="designation_id" v-text="$t('cruds.evaluation.fields.employee_id')"></label>
                                        <input class="form-control w-75 d-flex ml-auto" type="text" name="date" :value="user.employment_id" disabled>
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
                                        <input v-if="departmentHead.fullname == user.fullname" class="form-control w-75 d-flex ml-auto"
                                             type="text" name="manager" disabled :value="'CEO'">
                                        <input v-else class="form-control w-75 d-flex ml-auto" type="text" name="manager"
                                             v-text="departmentHead.user_id" disabled :value="departmentHead.fullname">
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
                                        <div v-if="evaluation == ''">
                                            <span class="addRating">
                                                <i class="fas fa-plus-square" style="cursor:pointer;" @click="addRow()"></i>
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="text-center">1 = Poor</th>
                                    <th scope="col" class="text-center">2 = Fair </th>
                                    <th scope="col" class="text-center">3 = Satisfactory</th>
                                    <th scope="col" class="text-center">4 = Good</th>
                                    <th scope="col" class="text-center">5 = Excelent</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-row-id="" v-for="(item, index) in rates.data" :key="index">
                                    <td>
                                        <div class="d-flex">
                                            <div v-if="evaluation == ''">
                                                <span class="text-white bg-danger d-flex align-self-center p-1 mr-2" style="border-radius:2px">
                                                    <i class="fas fa-trash-alt" @click="removeRow(index)"></i>
                                                </span>
                                            </div>
                                            <input v-model="item.name" type="text" class="form-control d-bock" required>
                                        </div>
                                        <div class="d-flex mt-1">
                                            <td>Comments</td>
                                                <div v-if="evaluation">
                                                    <input :value="evaluation ? item.pivot.comment : ''" type="text" class="form-control d-block">
                                                </div>
                                                <div v-else-if="evaluation == ''">
                                                    <input v-model="item.comment" type="text" class="form-control d-block">
                                                </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <div v-if="evaluation">
                                                    <input :checked="(item.pivot.rate == 1) ? 'checked' : ''" type="checkbox" aria-label="checkbox button for following text input">
                                                </div>
                                                <div v-else-if="evaluation == ''">
                                                    <input value="1" :name="'rate['+index+']'" v-model="item.rate" type="radio" aria-label="Radio button for following text input">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <div v-if="evaluation">
                                                    <input :checked="(item.pivot.rate == 2) ? 'checked' : ''" type="checkbox" aria-label="checkbox button for following text input">
                                                </div>
                                                <div v-else-if="evaluation == ''">
                                                    <input value="2" :name="'rate['+index+']'" v-model="item.rate" type="radio" aria-label="Radio button for following text input">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <div v-if="evaluation">
                                                    <input :checked="(item.pivot.rate == 3) ? 'checked' : ''" type="checkbox" aria-label="checkbox button for following text input">
                                                </div>
                                                <div v-else-if="evaluation == ''">
                                                    <input value="3" :name="'rate['+index+']'" v-model="item.rate" type="radio" aria-label="Radio button for following text input">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <div v-if="evaluation">
                                                    <input :checked="(item.pivot.rate == 4) ? 'checked' : ''" type="checkbox" aria-label="checkbox button for following text input">
                                                </div>
                                                <div v-else-if="evaluation == ''">
                                                    <input value="4" :name="'rate['+index+']'" v-model="item.rate" type="radio" aria-label="Radio button for following text input">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <div v-if="evaluation">
                                                    <input :checked="(item.pivot.rate == 5) ? 'checked' : ''" type="checkbox" aria-label="checkbox button for following text input">
                                                </div>
                                                <div v-else-if="evaluation == ''">
                                                    <input value="5" :name="'rate['+index+']'" v-model="item.rate" type="radio" aria-label="Radio button for following text input">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Overall Rating</td>
                                    <td colspan="5">
                                        <input type="text" class="form-control" :value="overallAvg">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- ...Ratings -->

                <!-- Evaluation -->
                <div class="card">
                    <h5 class="card-header bg-dark text-white">Evaluation</h5>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">{{$t('evaluation.evaluation_comments')}}</label>
                            <input type="text" class="form-control" v-model="rates.comment" name="comment">
                        </div>
                        <div class="form-group">
                            <label for="">{{$t('evaluation.evaluation_goals')}}</label>
                            <input type="text" class="form-control" v-model="rates.goal" name="goal">
                        </div>
                    </div>
                </div>
                <!-- ...Evaluation -->
                <div v-if="evaluation == ''">
                    <button class="btn btn-primary btn-sm buttonload"
                        type="submit" :disabled="rates.busy">
                        <i v-if="spinnerUpdateDepart" class="fa fa-spinner fa-spin"></i>
                        <span v-text="$t('global.create')"
                        ></span>
                    </button>
                </div>

            </form>
        </section>


    </div>
</template>

<script>

import { Form, HasError, AlertErrors, AlertSuccess } from 'vform'
import i18n from '../../plugins/i18n';

import print from 'vue-print-nb'

export default {
    components: {HasError, AlertErrors, AlertSuccess},
    directives: {
        print
    },

    props: ['langKey', 'user', 'designation', 'departmentTitle', 'departmentHead', 'manager', 'auth', 'evaluation'],
    data(){
        return {
            urlGetEvaluationRatings: '/api/v1/admin/hr/evaluations',
            spinnerUpdateDepart: false,
            // Row Data
            // rates: {},

            // Form Data
            rates: new Form({
                data: [], // user
                goal: '',
                comment: '',
                period: '',
                type: this.manager,
                auth: this.auth,
                user_id: this.user.user_id,
                avg_rate: this.overallAvg,
            }),

            overallAvg: 0,
            computeRate: '',
            year: '',
            month: '',
        }
    },
    watch: {
        'rates': {
            handler: function(items) {
                // console.log(items);
                var rateVals = [];
                var count = 0;
                items.data.forEach(item => {
                    if(item.rate) {
                        count ++;
                        rateVals.push(item.rate);
                        var sumRates = rateVals.reduce((current, previous) => {
                            return parseInt(current) + parseInt(previous);
                        }, 0)
                        return this.overallAvg = (sumRates / count).toFixed(1);
                    }
                });
            },
            deep: true
        },
        overallAvg: function(val) {
            console.log(val);
            this.rates.avg_rate = val;
        }
    },
    methods: {
        //Fetch Ratings From db
        getRatings(){
            axios.get(this.urlGetEvaluationRatings).then(response => {
                const data = response.data.data
                // this.rates = data;
                this.rates.data.push(...data);
                // console.log(this.rates);
            });
        },
        addRow(){
            this.rates.data.push({
                name: '',
                rate: '',
                comment: '',
            });
        },
        removeRow(index){
            this.rates.data.splice(index,1);
            // this.rates.splice(index + 1, 0, {});
        },
        rateUserSubmission(){
                // console.log(this.rates);
            this.spinnerUpdateDepart = true;
            $.ajax({
                url: this.urlGetEvaluationRatings,
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: this.rates,
                success: function (data) {
                    console.info(data);
                    // Reset the alert values if exists
                     document.querySelector(".alert-danger") ? document.querySelector(".alert-danger").remove() : '';
                    // **** Reset the alert values
                    this.spinnerUpdateDepart = false;

                    if(data == '201')
                    {
                        window.location.href = '/admin/hr/account-details'
                    }
                },
                error: function(error) {
                    console.log(error.responseJSON.errors);
                    this.spinnerUpdateDepart = false;
                    var errorObj = error.responseJSON.errors;
                    var result = Object.keys(errorObj).map((key) => [(key), errorObj[key]]);

                    result.forEach(elem => {
                        let appentToInput = document.querySelector('input[name="'+elem[0]+'"]')
                         // Reset the alert values if exists
                        document.querySelector(".alert-danger") ? document.querySelector(".alert-danger").remove() : '';
                         // **** Reset the alert values

                        var error = document.createElement("div");
                        error.className = "form-group alert alert-danger"
                        appentToInput.closest('.form-group').before(error)
                        elem.forEach(val => {
                            error.innerHTML = val
                        });
                    });
                }
            });
        },
        getDate(){
            var d = new Date();
            this.month = d.getMonth() + 1;
            this.year  = d.getFullYear();
        },

        // Load Evaluation by ID
        getEvaluation() {
            if (this.evaluation) {
                this.rates.fill(this.evaluation);
                this.rates.data = this.evaluation.rating_evaluations;
                this.overallAvg = this.evaluation.avg_rate;
            }
        },
    },
    mounted() {
        i18n.locale = this.langKey;

        this.getDate();
        this.getRatings();
        this.getEvaluation();

        (this.evaluation != '') ? this.$refs.evaluationPrintBtn.click() : '';
    }
}
</script>

<style scoped>
    .input-group-prepend {
        display: flex;
        justify-content: center;
    }
</style>
