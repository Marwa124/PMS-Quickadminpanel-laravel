<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        {{evaluation}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
            console.log('Component mounted.')

    export default {
        props: ['evaluation'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
