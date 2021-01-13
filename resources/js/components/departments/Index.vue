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
                    <td>
                        <input type="checkbox" v-model="departmentRows"
                        :id="row.id"
                        :value="row.department_name"
                        @click="selectedItems(row.id)">
                    </td>
                    <td v-for="(item, index) in row" :key="index">
                        <span v-if="index != 'department_head_account'">
                            <span v-if="index == 'department_head_id'">
                                {{row.department_head_account ? row.department_head_account.fullname : ''}}
                            </span>
                            <span v-else-if="index == 'department_designations'">
                                {{row.department_designations[0] ?
                                    row.department_designations[0].designation_name : ''}}
                            </span>
                            <span v-else>
                                {{item}}
                            </span>
                        </span>
                        <span v-else>
                            <div>
                                <a :href="`${urlDepartments}/${row.id}/edit`" v-text="$t('global.dit')"
                                    class="btn btn-primary btn-sm"></a>
                            </div>
                        </span>
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
            urlDepartmentsList: '/api/v1/admin/hr/departments/list-vue',
            urlDepartments: '/admin/hr/departments',
            dataResult: {},

            departmentRows: [],
            excelData: '',

            refActions: '',
        }
    },
    methods: {
        fireEditBtn(val){
            this.editDepartment = true;
            this.$router.push({name: 'departments-edit', params: {id: val}})
            console.log(this.$router);
            console.log(this.editDepartment);
        },

        // Multi Select
        selectedItems(data){
            console.log(data);
            console.log(this.departmentRows);
        },
    },
    mounted() {
        this.refActions = this.$refs._vmAction;

        document.getElementById('_vm').style.width = "1px";
    },
}
</script>
<style scoped>
    .table-responsive{
        display: table !important;
    }
</style>
