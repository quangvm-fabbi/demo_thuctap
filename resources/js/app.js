/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

let addToCartApi = $('#add-to-cart').val();
let getCartApi = $('#get-cart').val();

axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};
new Vue({
    el: '#app',
    data: {
        cart: {},
        total: 0,
        sumPrice: 0
    },
    methods: {
        addToCart: function(id, event) {
            event.preventDefault();

            var vm = this;
            axios.post(addToCartApi, {
                id: id
            }).then(function(response) {
                vm.cart = response.data && response.data.cart;
                vm.total = response.data && response.data.total;
                vm.sumPrice = response.data && response.data.sumPrice;
            });
        },
        getCart: function() {
            var vm = this;
            axios.get(getCartApi).then(function(response) {
                vm.cart = response.data && response.data.cart;
                vm.total = response.data && response.data.total;
                vm.sumPrice = response.data && response.data.sumPrice;
            });
        }
    },
    mounted: function() {
        this.getCart();
    }
});