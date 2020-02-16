<template>
	<div>
		<NavBar />
		<RecipeList :savedRecipes="savedRecipes" />
		<CreateCustomRecipe @customRecipe="customRecipe" />
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
	data() {
		return {
			savedRecipes: []
		};
	},
	created() {
		axios
			.get("/api/recipes")
			.then(({ data }) => (this.savedRecipes = data))
			.catch(error => console.log(error));
	},
	methods: {
		customRecipe(data) {
			this.savedRecipes = data;
		}
	}
};
</script>
