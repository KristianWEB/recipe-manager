<template>
	<div>
		<search @recipeData='detailedSearching'></search>
		<div class='flex justify-end mt-6 mx-8'>
			<button
				class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'
				@click='$modal.show('search')'
			>Search</button>
		</div>
		<div class='flex flex-wrap w-full justify-center mt-5'>
			<div v-for='(ingredient, index) in recipe.ingredients' :key='index' class='card-width'>
				<Recipe
					:title='recipe.title[index]'
					:imageUrl='recipe.imageUrl[index]'
					:calories='recipe.calories[index]'
					:dietLabels='recipe.dietLabels[index]'
					:ingredients='recipe.ingredients[index]'
					:sourceUrl='recipe.sourceUrl[index]'
				></Recipe>
			</div>
		</div>
	</div>
</template>

<script>
import Recipe from "./Recipe";
import search from "../SearchRecipes";
export default {
	components: {
		Recipe,
		search
	},
	data() {
		return {
			recipe: {
				title: [],
				imageUrl: [],
				calories: [],
				dietLabels: [],
				ingredients: [],
				sourceUrl: []
			}
		};
	},

	created() {
		const appId = process.env.RECIPE_ID;
		const appKey = process.env.RECIPE_KEY;
		axios
			.get(
				`https://api.edamam.com/search?q=chocolate&app_id=${appId}&app_key=${appKey}&from=0&to=9`
			)
			.then(({ data }) => {
				data.hits.forEach(({ recipe }) => {
					this.pushRecipeItems(this.recipe, recipe);
				});
			});
	},
	methods: {
		pushRecipeItems(dataArr, newItems) {
			dataArr.title.push(newItems.label);
			dataArr.imageUrl.push(newItems.image);
			dataArr.dietLabels.push(newItems.dietLabels);
			dataArr.calories.push(newItems.calories);
			dataArr.ingredients.push(newItems.ingredients);
			dataArr.sourceUrl.push(newItems.url);
		},

		detailedSearching(data) {
			const appId = process.env.RECIPE_ID;
			const appKey = process.env.RECIPE_KEY;

			Object.keys(this.recipe).forEach(element => {
				this.recipe[element] = [];
			});

			axios
				.get(
					`https://api.edamam.com/search?q=${
						data.name
					}&app_id=${appId}&app_key=${appKey}&from=0&to=${Number(
						data.results
					)}&calories=${data.calories}&cuisineType=${
						data.cuisineType
					}&diet=${data.dietLabels}&time=${data.cookingTime}`
				)
				.then(({ data }) => {
					data.hits.forEach(({ recipe }) => {
						this.pushRecipeItems(this.recipe, recipe);
					});
				})
				.catch(err => console.log(err));
			this.$modal.hide("search");
		}
	}
};
</script>

