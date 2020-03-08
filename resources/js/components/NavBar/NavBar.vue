<template>
  <ul class="flex justify-between bg-white border-b-1">
    <li class="ml-6">
      <a class="text-black font-medium text-3xl font-sans" href="#">RM</a>
    </li>
    <div class="flex justify-center items-center">
      <li class="mr-12">
        <router-link class="text-black" to="/home">Home</router-link>
      </li>
      <li>
        <router-link class="text-black" to="/storage">Storage</router-link>
      </li>
    </div>
    <li v-if="!currentUser" class="mr-6 flex items-center justify-center">
      <a class="text-orange" href="#">SIGN IN</a>
    </li>
    <li v-else class="mr-6 flex items-center justify-center">
      <a class="text-orange" href="#">{{ currentUser.username }}</a>
    </li>
  </ul>
</template>

<script>
export default {
  computed: {
    currentUser() {
      return this.$store.getters.currentUser;
    }
  }
};
</script>
