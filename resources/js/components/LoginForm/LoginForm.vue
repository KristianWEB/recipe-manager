<template>
  <div class="shadow-md w-96 font-roboto">
    <div class="bg-light-gray rounded-t-lg">
      <h1 class="p-6 text-3xl font-bold text-heading-primary">
        Sign in with your account
      </h1>
    </div>
    <form class="w-full bg-white" @submit.prevent="authenticate">
      <div class="w-full pt-8 px-5">
        <label for="email" class="text-dark-gray font-bold"
          >Email address</label
        >
        <input
          id="email"
          v-model="form.email"
          class="appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
          type="email"
          placeholder="example@gmail.com"
          name="email"
        />
      </div>
      <div class="w-full pt-6 px-5">
        <label for="password" class="text-dark-gray font-bold">Password</label>
        <input
          id="password"
          v-model="form.password"
          class="appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
          type="password"
          placeholder="Password ( at least 6 characters )"
          name="password"
        />
      </div>
      <div class="flex items-center justify-center pt-8 pb-4">
        <div>
          <button
            class="shadow text-white py-2 px-16 rounded bg-orange font-medium text-lg"
            type="submit"
          >
            Sign in
          </button>
        </div>
      </div>
      <div class="flex items-center justify-center rounded-b-lg">
        <h3 class="pb-3 text-dark-gray">
          Don't have an account?
          <router-link to="/register" class="text-orange font-bold"
            >Sign up</router-link
          >
        </h3>
      </div>
    </form>
  </div>
</template>

<script>
import { login } from "../../helpers/auth";
export default {
  data() {
    return {
      form: {
        email: "",
        password: ""
      },
      error: null
    };
  },
  methods: {
    authenticate() {
      this.$store.dispatch("login");
      login(this.$data.form)
        .then(res => {
          this.$store.commit("loginSuccess", res);
          this.$router.push({ path: "/" });
        })
        .catch(err => {
          this.$store.commit("loginFailed", { err });
        });
    }
  }
};
</script>
