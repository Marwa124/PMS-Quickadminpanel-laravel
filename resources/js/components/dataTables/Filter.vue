<template>
    <div>
        <div class="d-flex">

            <div class="form-group">
                show
                <select class="form-control-sm" @onSelect="onSelect" v-model="query.per_page"
                    @change="getAllDepartments()">
                    <option value="2">2</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                enteries
            </div>

            <div>
                <button class="btn btn-link" @click="generatePdf">PDF</button>
            </div>

            <!-- Excel -->
            <export-excel
                class="btn btn-default"
                v-if="excelDataTable"
                :data="excelDataTable"
                :fields="columns"
                :name="'idPage'"
            >
                <!-- type="csv" -->
            CSV
            </export-excel>
            <!-- ./Excel -->



            <div class="d-flex ml-auto">
                <span class="mr-1 mt-1">Search</span>
                <input type="text" class="form-control-sm"
                    v-model="query.search_input" @keyup.enter="getAllDepartments()"
                >
            </div>
        </div>


<!-- {{columns}} -->
<!-- {{dataTable}} -->
<!-- {{excelDataTable}} -->


    </div>
</template>


<script>
import Vue from 'vue'
import excel from 'vue-excel-export'

Vue.use(excel)

import jsPDF from 'jspdf'
import 'jspdf-autotable'

export default {
    name: 'DataTables',
    props: ['query', '_vmAction', 'columns', 'dataTable', 'excelDataTable'],
    data() {
        return {
            excelFieldsGlobal: {},
            excelFieldsExceptedGlobal: [
                ''
            ],
        }
    },
    methods: {
        getAllDepartments(){
            this.$emit('getAllDepartments');
        },
        onSelect(newSelectValue) {
            this.$emit('selectChange', newSelectValue);
        },
        removeActionsColumn(){
            let arr = [];
            for(let item in this.columns){
                arr.push(item);
            }
            return [...arr];
        },
        generatePdf(){
            var doc = new jsPDF('p', 'pt', 'A4');
            doc.autoTable({
                // html: this._vmAction,
                head: [this.removeActionsColumn()],
                body: [...this.dataTable],
            })
            doc.save('test.pdf');
        },
    },
    watch: {
        query(newVal){
            this.query.per_page = newVal.per_page;
        },
    },
    mounted() {
        this.removeActionsColumn();
    },
}
</script>
