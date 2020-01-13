<template>
	<div>
		<ul>
			<li v-for='(recipe, id) in recipes' :key='id'>
				<RecipeCard :recipe='recipe.recipe' />
			</li>
		</ul>
	</div>
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