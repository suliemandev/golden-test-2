// require("./bootstrap");

// window.Vue = require("vue");
// window.lang = localStorage.getItem('quiz_answers_lang') || 'ar';
// import VueRouter from "vue-router";
// Vue.use(VueRouter);

// Vue.config.productionTip = false

// import App from "./components/App";
// import Result from "./components/Result";
// import Home from "./components/Home";

// const router = new VueRouter({
//     mode: "history",
//     routes: [
//         {
//             path: "/:lang?",
//             name: "home",
//             component: Home,
//         },
//         {
//             path: "/result/:lang?",
//             name: "result",
//             component: Result,
//         },
//     ],
// });

// const app = new Vue({
//     el: "#app",
//     components: { App },
//     router,
// });



/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueAwesomeSwiper from 'vue-awesome-swiper'
import 'swiper/css/swiper.css'
Vue.use(VueAwesomeSwiper, /* { default options with global component } */)

import PortalVue from 'portal-vue'
Vue.use(PortalVue)

// import flatPickr from 'vue-flatpickr-component';
// import 'flatpickr/dist/flatpickr.css';
// require("flatpickr/dist/themes/airbnb.css");
// Vue.use(flatPickr);

import SweetAlertIcons from 'vue-sweetalert-icons';
Vue.use(SweetAlertIcons);


var VueScrollTo = require('vue-scrollto');
Vue.use(VueScrollTo)



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('navigation', require('./components/Navigation.vue').default);
Vue.component('slide-over', require('./components/SlideOver.vue').default);
Vue.component('dropdown', require('./components/Dropdown.vue').default);
Vue.component('modal', require('./components/Modal.vue').default);
Vue.component('particle', require('./components/Particle.vue').default);
Vue.component('quiz', require('./components/Quiz.vue').default);
Vue.component('question', require('./components/Question.vue').default);
Vue.component('x-button', require('./components/Button.vue').default);

// Vue.component('slider', require('./components/Slider.vue').default);
// Vue.component('brands', require('./components/Brands.vue').default);
// Vue.component('car-images', require('./components/CarImages.vue').default);
// Vue.component('book-now', require('./components/BookNow.vue').default);

Vue.prototype.__ = (key) => {
    return window.translations[key] || key;
}

Vue.prototype.$bus = new Vue(); 

const app = new Vue({
    el: '#app',
    data() {
        return {
            locale: window.locale,
            direction: window.direction,
        }
    },
    methods: {
        scrollTo(target) {
            this.$scrollTo(target)
        },

        slideToVideo() {
            this.scrollTo('#quiz', 300);
            setTimeout(() => this.$bus.$emit('slideToVideo'), 300);
        },
    }
});
