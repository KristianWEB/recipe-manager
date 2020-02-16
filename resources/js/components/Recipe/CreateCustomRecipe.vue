<template>
	<div>
		<button
			class="fixed mb-12 mr-12 bg-orange right-0 bottom-0 rounded-full p-2"
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
		<CreateRecipeModal @customRecipe="customRecipeData" />
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
		},
		customRecipeData(data) {
			this.$emit("customRecipe", data);
		}
	}
};
</script>

<style scoped></style>
