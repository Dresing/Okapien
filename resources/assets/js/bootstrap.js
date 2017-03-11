

//Important that these are in order as they are dependend.
import Vue from 'vue';
import Axios from 'axios';
import VueRouter from 'vue-router';
import router from './routes';
import API from'./lib/API'
import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.css'
import 'bulma'


//Bindings to window
window.axios = Axios
window.Vue = Vue
window.router = router
window.api = new API 

window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};


Vue.use(VueRouter);
Vue.use(VueMaterial)

Vue.material.registerTheme('default', {
  primary: 'deep-purple',
  accent: 'green',
  warn: 'deep-orange',
  background: 'white',
  secondary: 'brown'
})

Vue.material.setCurrentTheme('default')