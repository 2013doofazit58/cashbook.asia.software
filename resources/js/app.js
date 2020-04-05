require('./bootstrap');
window.Vue = require('vue');
// Import Editor
import CKEditor from '@ckeditor/ckeditor5-vue';
Vue.use( CKEditor );

// Filter import
import filter from './filter'

// Import Route
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import {routes} from './routes'
const router = new VueRouter({
    routes,
    mode:'history',
})

// Import Form
import { Form, HasError, AlertError } from 'vform'
window.Form = Form
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
// Import Alert
import Swal from 'sweetalert2'
window.Swal = Swal
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 1000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
window.Toast = Toast
// Master Component
Vue.component('admin-content', require('./admin/AdminMaster.vue').default);

// Paginate
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
    router,
});
