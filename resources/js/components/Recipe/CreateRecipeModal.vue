<template>
	<modal name="create-recipe" class="shadow-md font-roboto" height="auto">
		<div class="bg-light-gray rounded-t-lg">
			<h1 class="p-6 text-3xl font-bold text-heading-primary text-center">Create a Custom Recipe</h1>
		</div>
		<form class="w-full bg-white" @submit.prevent="createCustomRecipe()">
			<div class="w-full pt-8 px-5">
				<label for="name" class="text-dark-gray font-bold">Name</label>
				<input
					class="appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
					id="name"
					type="name"
					placeholder="Your recipe's name"
					name="name"
					v-model="name"
				/>
			</div>
			<div class="w-full pt-6 px-5">
				<label for="image" class="text-dark-gray font-bold">Image</label>
				<input
					class="appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
					id="image"
					type="text"
					placeholder="Recipe's image URL"
					name="image"
					v-model="imageUrl"
				/>
			</div>
			<div class="w-full pt-6 px-5 flex">
				<div class="pr-5">
					<label for="weight" class="text-dark-gray font-bold">Weight</label>
					<input
						class="appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
						id="weight"
						type="text"
						placeholder="Total Weight"
						name="weight"
						v-model="totalWeight"
					/>
				</div>
				<div>
					<label for="calories" class="text-dark-gray font-bold">Calories</label>
					<input
						class="appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
						id="calories"
						type="text"
						placeholder="Total Calories"
						name="calories"
						v-model="totalCalories"
					/>
				</div>
			</div>
			<form class="w-full pt-6 px-5" @submit.prevent="addIngredient">
				<label for="ingredients" class="text-dark-gray font-bold">Ingredients</label>
				<div class="flex">
					<input
						class="appearance-none rounded w-full py-2 px-4 mr-5 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
						id="ingredientText"
						type="text"
						placeholder="Ingredient's name"
						name="ingredientText"
						v-model="ingredient.text"
					/>
					<input
						class="appearance-none rounded w-1/3 py-2 px-4 mr-5 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
						id="ingredientWeight"
						type="text"
						placeholder="Weight"
						name="ingredientWeight"
						v-model="ingredient.weight"
					/>
					<button class="border border-dark-gray rounded-full p-1 text-black">
						<img
							svg-inline
							src="../../../../public/images/add-recipe.svg"
							fill="#616e7c"
							width="28px"
							height="28px"
							alt="add-recipe"
						/>
					</button>
				</div>
			</form>
			<div class="flex w-full px-5 pt-3" v-for="(ingredient, index) in ingredients" :key="index">
				<h1
					class="appearance-none rounded w-full py-2 px-4 mr-5 leading-tight focus:outline-none border border-dashed border-dark-gray text-heading-primary"
				>{{ ingredient.text }}</h1>
				<h1
					class="appearance-none rounded w-1/3 py-2 px-4 mr-5 leading-tight focus:outline-none text-center border border-dashed border-dark-gray text-heading-primary"
				>{{ ingredient.weight }}</h1>
				<button
					class="border border-red-600 rounded-full p-1 text-black"
					type="button"
					@click="removeIngredient(ingredient)"
				>
					<img
						svg-inline
						src="../../../../public/images/remove-outline.svg"
						width="28px"
						height="28px"
						alt="remove-ingredient"
					/>
				</button>
			</div>
			<div class="flex items-center justify-center pt-12 pb-6">
				<div>
					<button
						class="shadow text-white py-2 px-16 rounded bg-orange font-medium text-lg"
					>Create Recipe</button>
				</div>
			</div>
		</form>
	</modal>
</template>

<script>
export default {
	data() {
		return {
			name: "",
			imageUrl: "",
			totalWeight: "",
			totalCalories: "",
			ingredient: {
				text: "",
				weight: ""
			},
			ingredients: []
		};
	},
	methods: {
		addIngredient() {
			this.ingredients.push({ ...this.ingredient });
			this.ingredient.text = "";
			this.ingredient.weight = "";
		},
		removeIngredient(ingr) {
			return this.ingredients.splice(this.ingredients.indexOf(ingr), 1);
		},
		createCustomRecipe() {
			axios
				.post("/api/create-recipe", {
					image: this.imageUrl,
					label: this.name,
					ingredients: this.ingredients,
					calories: this.totalCalories,
					totalWeight: this.totalWeight,
					isSaved: true
				})
				.then(() => this.$store.dispatch("fetchRecipes"))
				.catch(err => console.log(err.response));
		}
	}
};
</script>
