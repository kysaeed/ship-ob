require('./bootstrap');

const Vue = require('vue');
window.BootstrapVue = require('bootstrap-vue');
Vue.use(window.BootstrapVue);

import ShipWorldView from './Components/ShipWorldView.vue';


const app = new Vue({
    el: '#app',
    components: {
        'ship-world-view': ShipWorldView,

     }
});
