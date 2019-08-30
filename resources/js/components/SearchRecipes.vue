<template>
	<div>
		<form class='w-full max-w-sm mx-auto p-2' @submit.prevent='search'>
			<modal name='search' width='50%' height='75%'>
				<div class='md:flex md:items-center mb-6'>
					<div class='w-full'>
						<input
							class='bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500'
							v-model='name'
							type='text'
							placeholder='Name'
						/>
					</div>
				</div>
				<div class='md:flex md:items-center mb-6'>
					<div class='w-full'>
						<input
							class='bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500'
							v-model='calories'
							type='text'
							placeholder='Calories'
						/>
					</div>
				</div>
				<div class='md:flex md:items-center mb-6'>
					<div class='w-full'>
						<input
							class='bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500'
							name='recipe_cuisineType'
							v-model='cuisineType'
							type='text'
							placeholder='CuisineType'
						/>
					</div>
				</div>
				<div class='md:flex md:items-center mb-6'>
					<div class='w-full'>
						<select
							class='bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500'
							name='recipe_dietLabels'
							v-model='dietLabels'
							type='text'
							selected='balanced'
						>
							<option value='balanced'>Balanced</option>
							<option value='high-protein'>High Proetin</option>
						</select>
					</div>
				</div>
				<div class='md:flex md:items-center mb-6'>
					<div class='w-full'>
						<input
							class='bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500'
							name='recipe_results'
							v-model='results'
							type='text'
							placeholder='Results'
						/>
					</div>
				</div>
				<div class='md:flex md:items-center mb-6'>
					<div class='w-full'>
						<input
							class='bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500'
							id='inline-username'
							name='recipe_cookingTime'
							v-model='cookingTime'
							type='text'
							placeholder='Cooking time'
						/>
					</div>
				</div>
				<div class='md:flex md:items-center'>
					<div class='w-full'>
						<button
							class='shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded'
							type='submit'
						>Search</button>
					</div>
				</div>
			</modal>
		</form>
	</div>
</template>

<script>
export default {
	data() {
		return {
			name: "",
			calories: "",
			cuisineType: "",
			dietLabels: "",
			results: "",
			cookingTime: ""
		};
	},
	methods: {
		search() {
			axios.post("/search-recipes", this.$data).then(res => {
				this.$emit("recipeData", JSON.parse(res.config.data));
			});
		}
	}
};
</script>
