<template>
    <div>
        <data-tables
            :query="query"
            :_vmAction="refActions"
            :columns="columnExport"
            :dataTable="dataExport"
            :excelDataTable="excelDataTables"
            @getAllDepartments="getAllDepartments()"
        >
            <!-- :dataTable="model.data" -->
        </data-tables>

        <table class="table table-striped table-bordered table-responsive" ref="_vmAction">
            <table-head
                :query="query"
                :columns="columns"
                :searchable="searchable"
                @getAllDepartments="getAllDepartments()"
            >
            </table-head>
            <tbody>
                <tr v-for="row in model.data" :key="row.id">
                    <!-- {{model.data}} -->
                    <td v-for="(item, index) in row" :key="index">
                        {{item}}
                    </td>
                    <td>
                        <a :href="urlEvaluation+'/'+row.id" class="btn btn-sm btn-danger text-white">
                            <i class="fas fa-file-pdf"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <pagination
            :query="query"
            :model="model"
            @getAllDepartments="getAllDepartments()"
        >
        </pagination>
    </div>
</template>



<script>
import Vue from 'vue';
import MixinsTable from '../../mixinsTable'
export default {
    mixins: [MixinsTable],

    data() {
        return {
            urlDepartmentsList: '/api/v1/admin/hr/evaluations/list',
            urlEvaluation: '/admin/hr/evaluations',
            dataResult: {},

            departmentRows: [],
            excelData: '',

            refActions: '',
        }
    },
    methods: {
        //
    },
    mounted() {
        this.refActions = this.$refs._vmAction;

        document.querySelector('.pdfLinkBtn').style.display = "none";
        document.getElementById('_vmid').style.width = "5%";
    },
}
</script>
<style scoped>
    .table-responsive{
        display: table !important;
    }
</style>
