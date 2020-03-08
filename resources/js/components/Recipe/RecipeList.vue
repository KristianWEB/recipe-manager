<template>
  <div>
    <ul v-if="recipes" class="flex flex-wrap justify-center my-4">
      <li
        v-for="(recipe, id) in recipes"
        :key="id"
        class="tabletMax:justify-center m-4 w-card mobileMax:w-full"
      >
        <RecipeCard :recipe="recipe.recipe" />
      </li>
    </ul>
    <ul
      v-if="savedRecipes"
      class="flex my-4 flex-wrap desktopMax:justify-center"
    >
      <li
        v-for="(recipe, id) in savedRecipes"
        :key="id"
        class="m-4 w-card mobileMax:w-full"
      >
        <RecipeCard :recipe="recipe" />
      </li>
    </ul>
  </div>
</template>

<script>
import RecipeCard from "../Recipe/RecipeCard";
export default {
  components: {
    RecipeCard
  },
  props: {
    recipes: { type: Array, default: null },
    savedRecipes: { type: Array, default: null }
  }
};
</script>
