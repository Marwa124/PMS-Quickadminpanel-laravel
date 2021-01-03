<template>
    <thead>
        <tr>
            <th style="position: relative;" v-for="(column, key) in columns"
                :key="key" @click="toggleSort(key)" :id="'_vm'+key">
                {{column}}
                <span v-if="searchable.includes(key)" style="position: absolute; right:10px;"
                    :class="key === query.column ? '' : 'text-muted'" class="sort-icons">
                    <span :class="query.direction === 'desc' ? '' : 'text-muted'">&uarr;</span>
                    <span :class="query.direction === 'asc' ? '' : 'text-muted'">&darr;</span>
                </span>
            </th>
        </tr>
    </thead>
</template>

<script>
export default {
    name: 'TableHead',
    props: ['query', 'columns', 'searchable'],
    data() {
        return {

        }
    },
    methods: {
        toggleSort(column){

            if (this.searchable.includes(column)) {
                if (column === this.query.column) {

                    // Change the direction Only for the same column
                    this.query.direction =
                        (this.query.direction === 'desc') ? 'asc' : 'desc';
                }else {
                    this.query.column = column
                    this.query.direction = 'asc'
                }
                this.$emit('getAllDepartments');
            }
        },
    },
}
</script>

<style scoped>
    #_vmid{
        width: 10%;
    }
    table th{
        cursor: pointer;
    }
    .text-muted{color: #6c757d80 !important;}
</style>
