<template>
	<div>
		<ul v-if="recipes" class="flex flex-wrap justify-center mt-6">
			<li class="w-auto mx-6 mb-6" v-for="(recipe, id) in recipes" :key="id">
				<RecipeCard :recipe="recipe.recipe" />
			</li>
		</ul>
		<div class="flex justify-center">
			<ul v-if="savedRecipes" class="w-5/6 flex flex-wrap mx-8 mt-8">
				<li class="w-card mx-4 mb-6" v-for="(recipe, id) in savedRecipes" :key="id">
					<RecipeCard :recipe="recipe" />
				</li>
			</ul>
		</div>
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
