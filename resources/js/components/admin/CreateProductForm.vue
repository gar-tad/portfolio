<template>
    <div class="card mt-2 mt-sm-3">
        <div class="card-body">
            <form v-on:submit.prevent="formSubmitHandler">
                <validation-error v-if='errors !== null' :message='errors.message'></validation-error>
                <div class="mb-3 pb-1">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                    <validation-error v-if='errors !== null && errors.errors.title' :messages='errors.errors.title'></validation-error>
                </div>
                <div class="mb-3 pb-1">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price">
                    <validation-error v-if='errors !== null && errors.errors.price' :messages='errors.errors.price'></validation-error>
                </div>
                <div class="mb-3 pb-2">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" class="form-control" v-model="description" name="description"></textarea>
                    <p class="text-secondary text-end">{{ descriptionLength }} chars</p>
                    <validation-error v-if='errors !== null && errors.errors.description' :messages='errors.errors.description'></validation-error>
                </div>
                <div class="my-4 px-4">
                    <media-upload></media-upload>
                </div>
                <div>
                    <button
                        type="submit"
                        class="btn d-block w-100 btn-outline-success"
                    >Add Product</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import ValidationError from "./ValidationError";
import MediaUpload from "./MediaUpload";
import { createNamespacedHelpers } from 'vuex';
const { mapActions } = createNamespacedHelpers('product');

export default {
    data() {
        return {
            description: '',
            errors: null
        };
    },
    components: {
        ValidationError,
        MediaUpload
    },
    props: {
        formSubmitCallback: Function
    },
    computed: {
        descriptionLength () {
            return this.description.length;
        }
    },
    methods: {
        formSubmitHandler (event) {
            this.storeProduct(event.target).then(() => {
                event.target.reset();
                this.formSubmitCallback();
            }).catch((errors) => {
                this.errors = errors;
            });
        },
        ...mapActions([
            'storeProduct',
        ]),
    }
}
</script>
