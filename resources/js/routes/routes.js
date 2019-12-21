import Home from "../components/Home.vue";
import Storage from "../components/Storage.vue";
import Account from "../components/Account.vue";
import Recipes from "../components/recipes/Recipes.vue";
import Register from "../pages/RegisterPage.vue";
import Login from "../pages/LoginPage.vue";

export const routes = [
    {
        path: "/",
        component: Home
    },
    {
        path: "/storage",
        component: Storage
    },
    {
        path: "/recipes",
        component: Recipes
    },
    {
        path: "/account",
        component: Account
    },
    {
        path: "/register",
        component: Register
    },
    {
        path: "/login",
        component: Login
    }
];
