<template>
	<div>
		<NavBar />
		<RecipeList :savedRecipes='savedRecipes' />
	</div>
</template>

<script>
import NavBar from "../components/NavBar/NavBar";
import RecipeList from "../components/Recipe/RecipeList";
export default {
	name: "home-page",
	components: {
		NavBar,
		RecipeList
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
	}
};
</script>
