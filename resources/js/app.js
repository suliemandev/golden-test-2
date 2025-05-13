require('./bootstrap');

window.Vue = require('vue');

import VueAwesomeSwiper from 'vue-awesome-swiper'
import 'swiper/css/swiper.css'
Vue.use(VueAwesomeSwiper, /* { default options with global component } */)

import PortalVue from 'portal-vue'
Vue.use(PortalVue)

import SweetAlertIcons from 'vue-sweetalert-icons';
Vue.use(SweetAlertIcons);

var VueScrollTo = require('vue-scrollto');
Vue.use(VueScrollTo)


Vue.component('navigation', require('./components/Navigation.vue').default);
Vue.component('slide-over', require('./components/SlideOver.vue').default);
Vue.component('dropdown', require('./components/Dropdown.vue').default);
Vue.component('modal', require('./components/Modal.vue').default);
Vue.component('particle', require('./components/Particle.vue').default);
Vue.component('quiz', require('./components/Quiz.vue').default);

Vue.component('question', require('./components/Question.vue').default);
Vue.component('questions', require('./components/Questions.vue').default);
Vue.component('x-button', require('./components/Button.vue').default);
Vue.component('sponsors', require('./components/Sponsors.vue').default);


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
            this.scrollTo('#quiz');
            setTimeout(() => this.$bus.$emit('slideToVideo'), 300);
        },
    }
});
