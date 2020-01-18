require("./bootstrap");
window.Vue = require("vue");

import Vue from "vue";
import VueRouter from "vue-router";
import Vuex from "vuex";
import VModal from "vue-js-modal";
import StoreData from "./store";
import { routes } from "./routes/routes";
import App from "./components/App.vue";

Vue.use(Vuex);
Vue.use(VModal);
Vue.use(VueRouter);

const store = new Vuex.Store(StoreData);

const router = new VueRouter({
    routes,
    mode: "history",
    linkExactActiveClass: "border-b-2 border-orange pb-3"
});

router.beforeEach((to, from, next) => {
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
    const currentUser = store.state.currentUser;
    if (requiresAuth && !currentUser) {
        next("/login");
    } else if (to.path == "/login" && currentUser) {
        next("/");
    } else if (to.path == "/register" && currentUser) {
        next("/");
    } else {
        next();
    }
});

const app = new Vue({
    el: "#app",
    router,
    store,
    components: {
        App
    }
});
