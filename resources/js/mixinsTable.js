import i18n from './plugins/i18n';

export default {
    data() {
        return {
            model  : {},
            columns: {},
            searchable: {},
            query: {
                page: 1,
                column: 'id',
                direction: 'desc',
                per_page: 25,
                search_input: '',
            },

            columnExport: {},
            dataExport: [],
            excelDataTables: [],

            errorResponse: '',
        }
    },
    methods: {
        getAllDepartments(){
            var vm = this;
            axios.get(`${this.urlDepartmentsList}?column=${this.query.column}
                    &direction=${this.query.direction}
                    &page=${this.query.page}&per_page=${this.query.per_page}
                    &search_input=${this.query.search_input}`)
                .then(response => {
                Vue.set(vm.$data, 'model', response.data.model)
                Vue.set(vm.$data, 'columns', response.data.columns)
                Vue.set(vm.$data, 'searchable', response.data.searchable)

// console.log(response.data.columns);
                this.excelDataTables = response.data.dataExport;

                // 2D array
                let resultObject = response.data.dataExport;
                if (resultObject) {
                    resultObject.forEach(element => {
                        const propertyValues = Object.values(element); // Object to Array
                        this.dataExport.push(propertyValues);
                    });
                }
                // --- 2D array

                // Columns Adjust for CSV File Export
                var keys = [];
                for (var key in this.columns) {
                    keys.push(key);
                }
                for (var i = 0; i <= keys.length - 1; i++) {
                    var value = this.columns[keys[i]];
                    if (value != 'Actions') {
                        if (value != '') {
                            this.columnExport[value]= keys[i];
                        }
                    }
                }
                // -- Columns Adjust for CSV File Export
            })
        },
        // Delete Evaluation
        deleteModelRow(id) {
            let dom = document.querySelector('.delete_model_row').closest('tr');
            let vm = this;

            if(confirm("Do you really want to delete?")){

                axios.delete(this.urlModelLink+'/'+id)
                    .then(response => {
                        if(response.data.status == 406) {
                            this.errorResponse = vm.$t('global.error_response')
                        }
                        setTimeout(() => {
                            this.errorResponse = ""
                        }, 2000);
                        console.log(response);
                        if(response.status == 204) dom.remove()
                    }).catch(error => {
                        console.log(error);
                    })

            }
        },
    },
    mounted() {
        i18n.locale = this.langKey;

        this.getAllDepartments()
        // console.log(this.$data);
    },
}
