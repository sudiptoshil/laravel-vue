
require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'

Vue.use(VueRouter)

//vue router related -----

import {routes} from './routes'

const router = new VueRouter({
  routes,
   mode:'history'
})
// v-form ----------------
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

// vuex statemanagement tools configure
import Vuex from 'vuex'

Vue.use(Vuex)
import storedata from './store/index'
const store = new Vuex.Store(
	storedata
)
// support moment js for timeformat

// support vue filter
import {filter} from './filter'



// sweet alert-------------------
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
window.Toast = Toast;


// vue default component-------------------

 // Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-main', require('./components/admin/adminmaster.vue').default);
Vue.component('public-main', require('./components/public/publicmaster.vue').default);
Vue.component('slider', require('./components/public/slider/slider.vue').default);
Vue.component('public-home', require('./components/public/publichome.vue').default);

const app = new Vue({
    el: '#app',
    router,
    store
});
