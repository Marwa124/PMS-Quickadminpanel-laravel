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

        <div v-if="errorResponse" class="alert alert-danger error_response" v-text="errorResponse"></div>

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
                        <div class="d-flex">
                            <a v-if="canPrint" :href="urlEvaluation+'/'+row.id" class="btn btn-sm btn-secondary text-white mr-1">
                                <i class="fas fa-file-pdf"></i>
                            </a>

                            <button v-if="canDelete" class="btn btn-sm btn-danger text-white delete_model_row" @click="deleteModelRow(row.id)">
                                <!-- :href="urlEvaluation+'/'+row.id" -->
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
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
import MixinsTable from '../../mixinsTable'
export default {
    mixins: [MixinsTable],

    props:  ['canPrint', 'canDelete'],

    data() {
        return {
            urlDepartmentsList: '/api/v1/admin/hr/evaluations/list',
            urlModelLink: '/api/v1/admin/hr/evaluations',
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
    },
}
</script>
<style scoped>
    .table-responsive{
        display: table !important;
    }
</style>
