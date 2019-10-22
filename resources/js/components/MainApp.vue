<template>
  <div id="main">
    <NavBar></NavBar>
    <div class="content">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import NavBar from "./NavBar";
export default {
  name: "main-app",
  components: {
    NavBar
  }
};
</script>
