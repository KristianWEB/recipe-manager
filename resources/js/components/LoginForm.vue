<template>
  <div>
    <modal name="login" width="100%" height="auto">
      <div class="w-384 h-full mx-auto">
        <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md h-full">
          <div
                class="font-semibold bg-purple-700 text-gray-100 py-3 px-6 mb-3 text-center"
              ><span class="flex flex-col inline-block text-2xl"><i class="material-icons text-white mb-5 text-5xl">launch</i>Login</span></div>

          <form class="w-full p-6" @submit.prevent="authenticateUser">
            <!-- @csrf -->
              <div class="flex flex-wrap mb-6">
                  <div class="flex justify-center items-center w-1/6 bg-purple-700"><i class="material-icons text-white">mail</i></div>

              <input
                id="email"
                type="email"
                class="shadow appearance-none border w-10/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                name="email"
                v-model="email"
				placeholder="E-Mail"
                required
                autofocus
              />
              <span v-if="has("email")" v-text="errors.email[0]" class="text-red-500"></span>
            </div>

            <div class="flex flex-wrap mb-6">
              <div class="flex justify-center items-center w-1/6 bg-purple-700"><i class="material-icons text-white">lock</i></div>

              <input
                id="password"
                type="password"
                class="shadow appearance-none border w-10/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                name="password"
                v-model="password"
				placeholder="Password"
                required
              />
              <span v-if="has("password")" v-text="errors.password[0]" class="text-red-500"></span>
            </div>

            <div class="flex mb-6">
              <input type="checkbox" name="remember" id="remember" v-model="remember" />
              <label class="text-sm text-gray-700 ml-3" for="remember">Remember Me</label>
            </div>

            <div class="flex flex-wrap items-center">
              <button
                type="submit"
                name="submit"
                class="bg-purple-700 hover:bg-purple-900 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
              >Login</button>
              <button
                type="button"
                class="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline ml-auto"
                @click="showResetPasswordForm"
              >Forgot Your Password?</button>
              <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
                <button
                  type="button"
                  class="text-blue-500 hover:text-blue-700 no-underline"
                  @click="showRegisterForm"
                >Don't have an account? Register</button>
              </p>
            </div>
          </form>
        </div>
      </div>
    </modal>
    <register></register>
    <resetPassword></resetPassword>
  </div>
</template>
<script>
export default {
  // TODO: Make an AJAX POST request to the server and validate the given information. Return a response or errors depending on the given data
  data() {
    return {
      email: "",
      password: "",
      remember: "",
      errors: []
    };
  },

  methods: {
    authenticateUser() {
      axios
        .post("/login", this.$data)
        .then(() => {
          window.location.pathname = "/storage";
        })
        .catch(error => {
          this.errors = error.response.data.errors;
        });
    },
    showResetPasswordForm() {
      this.switchModal("login", "resetPassword");
    },
    showRegisterForm() {
      this.switchModal("login", "register");
    },
    switchModal(oldModal, newModal) {
      this.$modal.hide(oldModal);
      this.$modal.show(newModal);
    },
    has(field) {
      return this.errors.hasOwnProperty(field);
    }
  }

  // TODO: Make new Register, forgotten password vue components DONE
  // TODO: Load dinamycally components which are dependent on buttons ( Don't have an account: Register ), ( Forgot your password? ) DONE
};
</script>

<style scoped>

[placeholder]:focus::-webkit-input-placeholder {
  transition: opacity 0.5s 0.5s ease; 
  opacity: 0;
}

</style>