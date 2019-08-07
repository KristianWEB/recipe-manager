<template>
	<div>
		<search @recipeData='detailedSearching'></search>
		<div class='flex justify-end mt-6 mx-8'>
			<button
				class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'
				@click='showModal'
			>Search</button>
		</div>
		<div class='flex flex-wrap w-full justify-center mt-5'>
			<div
				v-for='(ingredient, index) in recipe.ingredients'
				:key='index'
				class='w-1/4 rounded overflow-hidden shadow-lg mx-5 mb-5'
			>
				<img class='w-full' :src='recipe.imageURL[index]' :alt='recipe.title[index]' />
				<div class='px-6 py-4'>
					<div class='font-bold text-xl mb-2'>{{ recipe.title[index] }}</div>
					<h3 class='text-gray-700 text-base'>
						Ingredients:
						<ul>
							<li v-for='(item,index) in ingredient' :key='index'>{{ item }}</li>
						</ul>Diet Labels:
						<ul>
							<li
								v-for='(diet,dietId) in recipe.dietLabels'
								:key='dietId'
							>{{recipe.dietLabels[index][dietId]}}</li>
						</ul>Calories:
						<ul>
							<li>{{recipe.calories[index]}}</li>
						</ul>
					</h3>
					<p>
						<a :href='recipe.sourceURL[index]'>Source URL</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			recipe: {
				title: [],
				imageURL: [],
				calories: [],
				dietLabels: [],
				ingredients: [],
				sourceURL: []
			}
		};
	},
	created() {
		const appId = process.env.RECIPE_ID;
		const appKey = process.env.RECIPE_KEY;
		axios
			.get(
				`https://api.edamam.com/search?q=pizza&app_id=${appId}&app_key=${appKey}`
			)
			.then(({ data }) => {
				data.hits.forEach(({ recipe }) => {
					this.recipe.title.push(recipe.label);
					this.recipe.imageURL.push(recipe.image);
					this.recipe.dietLabels.push(recipe.dietLabels);
					this.recipe.calories.push(recipe.calories);
					this.recipe.ingredients.push(recipe.ingredientLines);
					this.recipe.sourceURL.push(recipe.url);
				});
			});
	},
	methods: {
		showModal() {
			this.$modal.show("search");
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
						this.recipe.title.push(recipe.label);
						this.recipe.imageURL.push(recipe.image);
						this.recipe.dietLabels.push(recipe.dietLabels);
						this.recipe.calories.push(recipe.calories);
						this.recipe.ingredients.push(recipe.ingredientLines);
						this.recipe.sourceURL.push(recipe.url);
					});
				});
			this.$modal.hide("search");
		}
	}
};
// recipe title, diet label, health label, calories
</script>

