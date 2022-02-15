<template>
  <div>
      <create-product/>
      <product-table :products="products" :onProductSelect="setSelectedProduct"></product-table>
      <product-view :product="selectedProduct" :onClose="setSelectedProduct"></product-view>
  </div>
</template>

<script>
import CreateProduct from "./CreateProduct";
import ProductTable from "./ProductTable";
import ProductView from "./ProductView";
import { createNamespacedHelpers } from 'vuex';
const { mapState, mapActions } = createNamespacedHelpers('product');

export default {
    data() {
        return {
            selectedProduct: null
        }
    },
    components: {
        CreateProduct,
        ProductTable,
        ProductView
    },
    mounted() {
        this.getProducts();
    },
    computed: mapState({
      products: state => state.products,
    }),
    methods: {
        setSelectedProduct (product) {
            this.selectedProduct = null;

            if (!product) return;

            axios.get('/admin/products/' + product.id)
                .then((response) => {
                    this.selectedProduct = response.data;
                })
        },
        ...mapActions([
            'getProducts',
        ]),
    }
}
</script>

<style scoped>

</style>
