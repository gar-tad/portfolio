<template>
    <div class="my-2">
        <button
            v-if="!isFormExpanded"
            type="button"
            class="btn d-block w-100 p-3 border-3 text-center border-primary text-primary animate__animated animate__fadeIn"
            @click='switchFormState'
        >
            <i class="bi bi-plus"></i> Add New Product!
        </button>
        <transition enter-active-class="animate__animated animate__fadeIn" >
            <div v-if="isFormExpanded">
                <button
                    type="button"
                    class="btn d-block w-100 p-3 border-3 text-center border-danger danger"
                    @click='switchFormState'
                >
                    <i class="bi bi-dash"></i> Close
                </button>
                <create-product-form v-bind:formSubmitCallback="formSubmitCallback"></create-product-form>
            </div>
        </transition>
    </div>
</template>

<script>
import CreateProductForm from "./CreateProductForm";
export default {
    components: {
        CreateProductForm
    },
    data () {
        return {
            isFormExpanded: false
        }
    },
    methods: {
        formSubmitCallback () {
            this.switchFormState();
        },
        switchFormState () {
            this.isFormExpanded = !this.isFormExpanded;
        }
    }
}
</script>
