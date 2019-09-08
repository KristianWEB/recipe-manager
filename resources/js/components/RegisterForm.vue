<template>
  <div>
    <modal name="register" width="100%" height="auto">
      <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
          <div class="w-full max-w-sm">
            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
              <div
                class="font-semibold bg-purple-700 text-gray-100 py-3 px-6 mb-3 text-center"
              ><span class="flex flex-col inline-block text-2xl"><i class="material-icons text-white mb-5 text-5xl">note_add</i>Register</span></div>

              <form class="w-full p-6" @submit.prevent="registerUser">
                <div class="flex flex-wrap mb-6">

                  <div class="flex justify-center items-center w-1/6 bg-purple-700"><i class="material-icons text-white">person</i></div>

                  <input
                    id="name"
                    type="text"
                    class="shadow appearance-none border bg-gray-200 w-10/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="name"
                    placeholder="Username"
                    required
                    autofocus
                    v-model="name"
                  />
                </div>

                <div class="flex flex-wrap mb-6">
                  <div class="flex justify-center items-center w-1/6 bg-purple-700"><i class="material-icons text-white">mail</i></div>

                  <input
                    id="email"
                    type="email"
                    class="shadow appearance-none bg-gray-200 border w-10/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="email"
                    placeholder="E-Mail Adress"
                    required
                    v-model="email"
                  />
                  <span v-if="has("email")" v-text="errors.email[0]" class="text-red-500"></span>
                </div>

                <div class="flex flex-wrap mb-6">
                   <div class="flex justify-center items-center w-1/6 bg-purple-700"><i class="material-icons text-white">lock</i></div>

                  <input
                    id="password"
                    type="password"
                    class="shadow appearance-none border bg-gray-200 w-10/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="password"
                    placeholder="Password"
                    required
                    v-model="password"
                  />
                  <span v-if="has("password")" v-text="errors.password[0]" class="text-red-500"></span>
                </div>

                <div class="flex flex-wrap mb-6">
                   <div class="flex justify-center items-center w-1/6 bg-purple-700"><i class="material-icons text-white">lock</i></div>

                  <input
                    id="password-confirm"
                    type="password"
                    class="shadow appearance-none border bg-gray-200 w-10/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="password_confirmation"
                    placeholder="Confirm Password"
                    required
                    v-model="password_confirmation"
                  />
                </div>

                <div class="flex flex-wrap">
                  <button
                    type="submit"
                    class="w-full inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-purple-700 hover:bg-purple-900"
                  >Register</button>

                  <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
                    Already have an account?
                    <button
                      type="button"
                      class="text-blue-500 hover:text-blue-700 no-underline"
                      @click='showLoginForm'
                    >Login</button>
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </modal>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "",
      email: "",
      password: "",
      password_confirmation: "",
      errors: []
    };
  },
  methods: {
    registerUser() {
      axios
        .post("/register", this.$data)
        .then(() => {
          window.location.pathname = "/account";
        })
        .catch(error => {
          this.errors = error.response.data.errors;
        });
    },
    has(field) {
      return this.errors.hasOwnProperty(field);
    },
    showLoginForm() {
     this.$modal.hide('register');
     this.$modal.show('login');
    }
  }
};
</script>

<style  scoped>

[placeholder]:focus::-webkit-input-placeholder {
  transition: opacity 0.5s 0.5s ease; 
  opacity: 0;
}

</style>