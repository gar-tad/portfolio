require('./bootstrap');

import store from './store';
import ProductList from "./components/admin/ProductList";

const app = new Vue({
    el: '#app',
    store,
    components: {
        ProductList
    },
    template: '<ProductList/>'
});