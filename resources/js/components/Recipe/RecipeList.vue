<template>
  <ul class="flex flex-wrap justify-end mr-24">
    <li class="w-auto m-8" v-for="(recipe, id) in recipes" :key="id">
      <RecipeCard :recipe="recipe.recipe" />
    </li>
  </ul>
</template>

<script>
import RecipeCard from "../Recipe/RecipeCard";
export default {
  props: ["recipes"],
  components: {
    RecipeCard
  }
};
</script>

<style>
</style>