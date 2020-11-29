<template>
    <button
        type="submit"
        :disabled="form.busy"
        class="btn btn-success btn-sm float-right">
        {{ text && text != null ? text : 'update' }}

        <span v-if="form.busy" class="btn-loader"></span>
    </button>
</template>


<script>
    export default {
        props: ['form', 'text']
    }
</script>
