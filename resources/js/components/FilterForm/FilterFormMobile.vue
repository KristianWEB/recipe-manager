<template>
	<div>
		<button
			class="fixed mb-12 mr-12 tabletMax:mb-6 tabletMax:mr-6 bg-orange right-0 bottom-0 rounded-full p-2 z-50"
			@click="createRecipe"
		>
			<img
				svg-inline
				src="../../../../public/images/search-outline.svg"
				fill="#fff"
				width="35px"
				height="35px"
				alt="add-icon"
			/>
		</button>
		<FilterFormMobileModal @searchData="search" />
	</div>
</template>

<script>
import FilterFormMobileModal from "./FilterFormMobileModal";
export default {
	components: {
		FilterFormMobileModal
	},
	methods: {
		createRecipe() {
			this.$modal.show("detailed-searching");
		},
		search(data) {
			this.$emit("searchData", data);
		}
	}
};
</script>

<style scoped></style>
