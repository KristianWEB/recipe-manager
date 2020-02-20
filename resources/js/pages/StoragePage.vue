<template>
	<div>
		<NavBar />
		<RecipeList :savedRecipes="savedRecipes" />
		<CreateCustomRecipe />
	</div>
</template>

<script>
import NavBar from "../components/NavBar/NavBar";
import RecipeList from "../components/Recipe/RecipeList";
import CreateCustomRecipe from "../components/Recipe/CreateCustomRecipe";
export default {
	name: "home-page",
	components: {
		NavBar,
		RecipeList,
		CreateCustomRecipe
	},
	created() {
		this.$store.dispatch("fetchRecipes");
	},
	computed: {
		savedRecipes() {
			return this.$store.getters.savedRecipes;
		}
	}
};
</script>
