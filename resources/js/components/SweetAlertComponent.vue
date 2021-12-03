<template>
    <button @click="showAlert">Click</button>
</template>

<script>
    import VueSweetalert2 from 'vue-sweetalert2';
    Vue.use(VueSweetalert2);

    export default {
        components: {
            VueSweetalert2
        },
        methods: {
            showAlert() {
                // Use sweetalert2
                this.$swal('Hello Vue world!!!');
            },
        },
    }

</script>


<style lang='scss'>
    @import '~sweetalert2/dist/sweetalert2.min.css';
</style>
