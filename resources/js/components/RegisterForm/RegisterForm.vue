<template>
  <div id="registerFormContainer" class="shadow-md rounded-lg">
    <div id="headingContainer">
      <h1 id="heading" class="p-6 text-3xl font-semibold">Create an account</h1>
    </div>
    <form class="w-full bg-white-300">
      <div class="md:flex md:items-center mb-6">
        <div class="w-full mt-6 px-5">
          <label for="username" class="labelText">Username</label>
          <input
            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 leading-tight focus:outline-none"
            id="inline-full-name"
            type="text"
            placeholder="Your username"
          />
        </div>
      </div>
      <div class="w-full mt-6 px-5">
        <label for="email" class="labelText">Email address</label>
        <input
          class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 leading-tight focus:outline-none"
          id="email"
          type="text"
          placeholder="example@gmail.com"
        />
      </div>
      <div class="w-full mt-6 px-5">
        <label for="password" class="labelText">Password</label>
        <input
          class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 leading-tight focus:outline-none"
          id="password"
          type="text"
          placeholder="Password ( at least 6 characters )"
        />
      </div>
      <div class="flex items-center justify-center pt-6 pt-6 pb-4">
        <div class="md:w-1/3"></div>
        <div class="md:w-2/3">
          <button
            id="submitBtn"
            class="shadow text-white py-2 px-4 rounded"
            type="button"
          >Create your account</button>
        </div>
      </div>
      <div class="flex items-center justify-center">
        <h3 class="signUpHeading pb-3">
          Already have an account?
          <a href="#" class="signUpLink">Sign in</a>
        </h3>
      </div>
    </form>
  </div>
</template>

<script></script>

<style>
.signUpHeading {
  color: #616e7c;
}

.signUpLink {
  color: #f35627;
  font-weight: 500;
}
#registerFormContainer {
  width: 30rem;
  font-family: "Roboto";
}

#submitBtn {
  background: #f35627;
  font-weight: 500;
  font-size: 18px;
  padding: 0.5rem 4rem;
}

#registerFormContainer #headingContainer {
  background: rgba(228, 231, 235, 0.5);
}
#registerFormContainer #heading {
  font-weight: 500;
}

#registerFormContainer input {
  background: rgba(228, 231, 235, 0.5);
}
#registerFormContainer input input::placeholder {
  color: #7b8793;
}

.labelText {
  font-weight: 500;
  color: #616e7c;
}
</style>