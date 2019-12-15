require("./bootstrap");
window.Vue = require("vue");

import Vue from "vue";
import VueRouter from "vue-router";
import Vuex from "vuex";
import VModal from "vue-js-modal";
import StoreData from "./store";
import { routes } from "./routes/routes";
import App from "./components/App.vue";

Vue.use(VModal);
Vue.use(VueRouter);
Vue.use(Vuex);

// const store = Vuex.store(StoreData);

const router = new VueRouter({
    routes,
    mode: "history"
});

const app = new Vue({
    el: "#app",
    router,
    // store,
    components: {
        App
    }
});
