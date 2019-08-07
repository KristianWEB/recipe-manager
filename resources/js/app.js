require('./bootstrap');

window.Vue = require('vue');
import VModal from 'vue-js-modal';
Vue.use(VModal);
Vue.component('recipes', require('./components/recipes/Recipes.vue').default);

Vue.component('navbar', require('./components/NavBar.vue').default);
Vue.component('search', require('./components/SearchRecipes.vue').default);

const app = new Vue({
    el: '#app'
});
