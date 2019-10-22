<template>
  <div class="bg-black text-white px-12 py-5">
    <ul class="flex justify-between">
      <div class="flex">
        <li class="mr-6">
          <router-link to="/">HOME</router-link>
        </li>
        <li class="mr-6">
          <router-link to="/recipes">RECIPES</router-link>
        </li>
        <li class="mr-6">
          <router-link to="/storage">STORAGE</router-link>
        </li>
      </div>
      <div class="flex">
        <li>
          <router-link to="/account">SIGN IN</router-link>
        </li>
      </div>
    </ul>
  </div>
</template>

<script>
export default {};
</script>

