<template>
    <table class="table table-bordered table-responsive product-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(product) in products" :key="'product_' + product.id">
                <td class="w-25">
                    <a href="#" @click.prevent="onProductSelect(product)" class="btn btn-link outline-none">
                    {{ product.title }}
                    </a>
                </td>
                <td>{{ product.price }}</td>
                <td>
                    <p class="hide-long-text">
                        <span v-if="product.description.length > 250">
                            {{ product.description.substr(0, 250) }}...
                        </span>
                        <span v-else>
                            {{ product.description }}
                        </span>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    props: {
        products: Array,
        onProductSelect: Function
    }
}
</script>
