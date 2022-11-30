require('./bootstrap');
import Vue from "vue";

Vue.component('counter',require('./components/counter.vue').default);
Vue.component('multiple-image-input',require('./components/multipleimageinpu.vue').default);
Vue.component('single-image-input',require('./components/singleimageinput.vue').default);
Vue.component('single-image-input-without-preview',require('./components/singleimageinputwithoutpreview.vue').default);


var VueObj = new Vue({
    data(){
      return{
        
      }
    },
    created: function () {
      
    },
    methods:{
  
    }
  }).$mount('#vueapp')

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
