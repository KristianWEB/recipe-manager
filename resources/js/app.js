require("./bootstrap");

window.Vue = require("vue");
import VModal from "vue-js-modal";
Vue.use(VModal);
Vue.component("Recipes", require("./components/recipes/Recipes.vue").default);
Vue.component("Recipe", require("./components/recipes/Recipe.vue").default);

Vue.component("navbar", require("./components/NavBar.vue").default);
Vue.component("search", require("./components/SearchRecipes.vue").default);
Vue.component("login", require("./components/LoginForm.vue").default);
Vue.component("register", require("./components/RegisterForm.vue").default);
Vue.component(
    "resetPassword",
    require("./components/ResetPassword.vue").default
);

const app = new Vue({
    el: "#app"
});
