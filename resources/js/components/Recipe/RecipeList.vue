<template>
	<div>
		<ul v-if="recipes" class="flex flex-wrap justify-center my-4">
			<li
				class="tabletMax:justify-center m-4 w-card mobileMax:w-full"
				v-for="(recipe, id) in recipes"
				:key="id"
			>
				<RecipeCard :recipe="recipe.recipe" />
			</li>
		</ul>
		<ul v-if="savedRecipes" class="flex my-4 flex-wrap tabletMax:justify-center">
			<li
				class="my-4 tabletMax:justify-center w-card mx-4"
				v-for="(recipe, id) in savedRecipes"
				:key="id"
			>
				<RecipeCard :recipe="recipe" />
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
