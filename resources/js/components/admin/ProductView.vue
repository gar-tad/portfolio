<template>
    <transition name="slide">
        <aside v-if="product" class="wrapper px-2">
            <div class="text-end p-3">
                <span class="text-danger cursor-pointer" @click="onClose(false)">
                    <i class="bi bi-x"></i>
                    close
                </span>
            </div>
            <div>
                <h2>{{product.title}}</h2>
                <p>{{product.price}}$</p>
                <p>{{product.description}}</p>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div v-for="image in product.media" :key="'product_media_' + image.id" class="col-lg-3 col-4 mb-2">
                        <img :src="image.src" width="100%" class="w-100">
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-secondary" @click="onClose(false)">close</button>
                <button class="btn btn-danger" @click="onDelete">delete</button>
            </div>
        </aside>
    </transition>
</template>

<script>
import { createNamespacedHelpers } from 'vuex';
const { mapActions } = createNamespacedHelpers('product');

export default {
    props: {
        product: Object,
        onClose: Function
    },
    methods: {
        onDelete() {
            this.deleteProduct(this.product.id).then(() => {
                this.onClose(false);
            });
        },
        ...mapActions([
            'deleteProduct',
        ])
    }
}
</script>

<style scoped>
    .wrapper {
        position: fixed;
        background: white;
        right: 0px;
        top: 0;
        bottom: 0;
        width: 500px;
        overflow-y: hidden;
        box-shadow: -5px 0px #cdcdcd54;
    }

    .slide-enter-active, .slide-leave-active {
        transition: right .3s linear;
    }
    .slide-enter, .slide-leave-to {
        right: -500px;
    }

    @media screen and (max-width: 500px) {
        .wrapper {
            width: 100%;
        }
    }
</style>
