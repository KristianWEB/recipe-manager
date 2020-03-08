import { getLocalUser } from "./helpers/auth";

const user = getLocalUser();

export default {
  state: {
    currentUser: user,
    isLoggedIn: !!user,
    loading: false,
    auth_error: null,
    savedRecipes: null
  },
  getters: {
    isLoading(state) {
      return state.loading;
    },
    isLoggedIn(state) {
      return state.isLoggedIn;
    },
    currentUser(state) {
      return state.currentUser;
    },
    authError(state) {
      return state.auth_error;
    },
    savedRecipes(state) {
      return state.savedRecipes;
    }
  },
  mutations: {
    login(state) {
      state.loading = true;
      state.auth_error = null;
    },
    register(state) {
      state.loading = true;
      state.auth_error = null;
    },
    recipes(state, savedRecipes) {
      state.savedRecipes = savedRecipes;
    },
    loginSuccess(state, payload) {
      state.auth_error = null;
      state.isLoggedIn = true;
      state.loading = false;
      state.currentUser = {
        ...payload.user,
        token: payload.access_token
      };
      localStorage.setItem("user", JSON.stringify(state.currentUser));
    },
    loginFailed(state, payload) {
      state.loading = false;
      state.auth_error = payload.err;
    }
  },
  actions: {
    login(context) {
      context.commit("login");
    },
    register(context) {
      context.commit("register");
    },
    fetchRecipes(context) {
      axios
        .get("/api/recipes")
        .then(({ data }) => context.commit("recipes", data));
    }
  }
};
