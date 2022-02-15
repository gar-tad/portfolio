require('./bootstrap');



import store from './store/index';
import IndexComponent from "./components/IndexComponent";

const app = new Vue({
    el: '#app',
    store,
    components: {
        IndexComponent
    },
    template: '<index-component/>'
});

