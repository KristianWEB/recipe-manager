<template>
  <div>
    <modal name="login" width="100%" height="auto">
      <div class="w-full h-full">
        <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md h-full">
          <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">Login</div>

          <form class="w-full p-6" method="POST" action="/login">
            <!-- @csrf -->
            <div class="flex flex-wrap mb-6">
              <label for="email" class="block text-gray-700 text-sm font-bold mb-2">E-Mail Address:</label>

              <input
                id="email"
                type="email"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                name="email"
                required
                autofocus
              />
            </div>

            <div class="flex flex-wrap mb-6">
              <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>

              <input
                id="password"
                type="password"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                name="password"
                required
              />
            </div>

            <div class="flex mb-6">
              <input type="checkbox" name="remember" id="remember" />
              <label class="text-sm text-gray-700 ml-3" for="remember">Remember Me</label>
            </div>

            <div class="flex flex-wrap items-center">
              <button
                type="submit"
                name="submit"
                class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
              >Login</button>
              <a
                class="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline ml-auto"
                href="/password.request"
              >Forgot Your Password?</a>
              <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
                <a class="text-blue-500 hover:text-blue-700 no-underline" href="/register">Register</a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </modal>
  </div>
</template>
<script>
export default {
  // TODO: Make an AJAX POST request to the server and validate the given information. Return a response or errors depending on the given data
  // TODO: Make new Register, forgotten password vue components
  // TODO: Load dinamycally components which are dependent on buttons ( Don't have an account: Register ), ( Forgot your password? )
};
</script>