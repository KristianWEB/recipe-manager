<template>
	<div>
		<NavBar />
		<RecipeList :recipes='recipes' />
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
			recipes: []
		};
	},
	created() {
		const appId = process.env.MIX_APP_ID;
		const appKey = process.env.MIX_APP_KEY;
		axios
			.get(
				`https://api.edamam.com/search?q=chocolate&app_id=${appId}&app_key=${appKey}&from=0&to=9`,
				{
					"Access-Control-Allow-Origin": "*"
				}
			)
			.then(({ data }) => (this.recipes = data.hits))
			.catch(error => console.log(error));
	}
};
</script>
