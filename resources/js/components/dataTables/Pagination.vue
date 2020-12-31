<template>
    <div>
        <div class="d-flex justify-content-between">
            <span class="d-flex">Showing {{model.from}} to {{model.to}} of {{model.total}} entries</span>
            <div>
                <button @click="prev()"
                    :class="`btn btn-info btn-sm ${(model.current_page == 1) ? 'disabled text-white' : ''}`"
                >Previous</button>

                <button v-for="(val, index) in model.last_page" :key="index"
                    :class="`btn btn-${(model.current_page == (index+1)) ? 'info' : 'link'} btn-sm`"
                    @click="pageSelectNumber(index+1)">
                    {{index+1}}
                </button>
                <button @click="next()"
                    :class="`btn btn-info btn-sm ${(model.last_page == model.current_page) ? 'disabled text-white' : ''}`"
                >Next</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Pagination',
    props: ['model', 'query'],
    data() {
        return {

        }
    },
    methods: {
        // Paginating
        next(){
            if (this.model.next_page_url) {
                this.query.page++;
                this.$emit('getAllDepartments');
            }
        },
        prev(){
            if (this.model.prev_page_url) {
                this.query.page--;
                this.$emit('getAllDepartments');
            }
        },
        pageSelectNumber(index){
            this.query.page = index;
            this.$emit('getAllDepartments');
        },
    },
}
</script>
