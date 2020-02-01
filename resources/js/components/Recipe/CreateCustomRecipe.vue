<template>
	<div>
		<button
			class='fixed mb-12 mr-12 bg-orange right-0 bottom-0 rounded-full p-2'
			@click='createRecipe'
		>
			<img src='../../../../public/images/add-recipe.svg' alt='add-icon' />
		</button>
        <CreateRecipeModal />
	</div>
</template>

<script>
import CreateRecipeModal from "./CreateRecipeModal";
export default {
    components: {
        CreateRecipeModal
    },
	methods: {
		createRecipe() {
			this.$modal.show("create-recipe");
		}
	}
};
</script>

<style scoped>
</style>
