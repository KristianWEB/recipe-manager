import Home from "../pages/HomePage.vue";
import Storage from "../pages/StoragePage.vue";
import Register from "../pages/RegisterPage.vue";
import Login from "../pages/LoginPage.vue";

export const routes = [
  {
    path: "/",
    redirect: "/home"
  },
  {
    path: "/home",
    component: Home,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: "/storage",
    component: Storage,
    meta: {
      requiresAuth: true
    }
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
