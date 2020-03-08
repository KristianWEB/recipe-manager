<template>
  <div>
    <NavBar />
    <RecipeList :saved-recipes="savedRecipes" />
    <CreateCustomRecipe />
  </div>
</template>

<script>
import NavBar from "../components/NavBar/NavBar";
import RecipeList from "../components/Recipe/RecipeList";
import CreateCustomRecipe from "../components/Recipe/CreateCustomRecipe";
export default {
  name: "StoragePage",
  components: {
    NavBar,
    RecipeList,
    CreateCustomRecipe
  },
  computed: {
    savedRecipes() {
      return this.$store.getters.savedRecipes;
    }
  },
  created() {
    this.$store.dispatch("fetchRecipes");
  }
};
</script>
