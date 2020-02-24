<template>
	<div>
		<button
			class="fixed mb-12 mr-12 tabletMax:mb-6 tabletMax:mr-6 bg-orange right-0 bottom-0 rounded-full p-2 z-50"
			@click="createRecipe"
		>
			<img
				svg-inline
				src="../../../../public/images/add-recipe.svg"
				fill="#fff"
				width="35px"
				height="35px"
				alt="add-icon"
			/>
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

<style scoped></style>
