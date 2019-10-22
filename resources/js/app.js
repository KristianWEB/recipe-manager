require("./bootstrap");
window.Vue = require("vue");

import Vue from "vue";
import VueRouter from "vue-router";
import Vuex from "vuex";
import VModal from "vue-js-modal";
import StoreData from "./store";
import { routes } from "./routes";
import MainApp from "./components/MainApp.vue";

Vue.use(VModal);
Vue.use(VueRouter);
// Vue.use(Vuex);

// const store = Vuex.store(StoreData);

const router = new VueRouter({
    routes,
    mode: "history"
});

Vue.component("main-app", require("./components/MainApp.vue").default);

// Vue.component('recipes', require('./components/recipes/Recipes.vue').default);

// Vue.component('navbar', require('./components/NavBar.vue').default);
// Vue.component('search', require('./components/SearchRecipes.vue').default);
// Vue.component('login', require('./components/LoginForm.vue').default);
// Vue.component('register', require('./components/RegisterForm.vue').default);
// Vue.component(
//     'resetPassword',
//     require('./components/ResetPassword.vue').default
// );

const app = new Vue({
    el: "#app",
    router,
    // store,
    components: {
        MainApp
    }
});
