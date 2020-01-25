<template>
	<div>
		<ul v-if='recipes' class='flex flex-wrap jutify-end mr-4'>
			<li class='w-auto m-8' v-for='(recipe, id) in recipes' :key='id'>
				<RecipeCard :recipe='recipe.recipe' />
			</li>
		</ul>
		<ul v-if='savedRecipes' class='flex flex-wrap justify-start mr-24 overflow-y-auto'>
			<li class='w-auto m-8' v-for='(recipe, id) in savedRecipes' :key='id'>
				<RecipeCard :recipe='recipe' />
			</li>
		</ul>
	</div>
</template>

<script>
import RecipeCard from "../Recipe/RecipeCard";
export default {
	props: ["recipes", "savedRecipes"],
	components: {
		RecipeCard
	}
};
</script>

<style></style>
