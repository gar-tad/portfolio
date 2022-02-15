import axios from "axios";

const product = {
    namespaced: true,
    state: () => ({
        products: []
    }),
    mutations: {
        setProducts(state, products) {
            state.products = products;
        }
    },
    actions: {
        getProducts(context) {
            return new Promise((resolve, reject) => {
                axios.get('/admin/products').then((response) => {
                    context.commit('setProducts', response.data);
                    resolve();
                })
            })
        },
        storeProduct(context, form) {
            return new Promise((resolve, reject) => {
                axios.post('/admin/products', new FormData(form))
                    .then(() => {
                        context.dispatch('getProducts').then(() => {
                            resolve();
                        });
                    })
                    .catch((errors) => {
                        reject(errors.response.data)
                    });
            })
        },
        deleteProduct(context, productId) {
            return new Promise((resolve, reject) => {
                axios.delete('/admin/products/' + productId)
                    .then(() => {
                        context.dispatch('getProducts').then(() => {
                            resolve();
                        });
                    });
            })
        }
    }
  }

  export default product;