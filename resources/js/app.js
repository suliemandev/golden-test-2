require("./bootstrap");

window.Vue = require("vue");
window.lang = localStorage.getItem('quiz_answers_lang') || 'ar';
import VueRouter from "vue-router";
Vue.use(VueRouter);

Vue.config.productionTip = false

import App from "./components/App";
import Result from "./components/Result";
import Home from "./components/Home";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/:lang?",
            name: "home",
            component: Home,
        },
        {
            path: "/result/:lang?",
            name: "result",
            component: Result,
        },
    ],
});

const app = new Vue({
    el: "#app",
    components: { App },
    router,
});
