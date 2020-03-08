<template>
  <modal
    name="create-recipe"
    class="shadow-md font-roboto"
    height="auto"
    :adaptive="true"
  >
    <div class="bg-light-gray rounded-t-lg flex justify-between">
      <h1
        class="p-3 text-3xl font-bold text-heading-primary text-center m-auto"
      >
        Create a Custom Recipe
      </h1>
      <button
        class="m-5 text-4xl text-outline"
        @click="$modal.hide('create-recipe')"
      >
        &times;
      </button>
    </div>
    <form class="w-full bg-white" @submit.prevent="createCustomRecipe()">
      <div class="w-full pt-8 px-5">
        <label for="name" class="text-dark-gray font-bold">Name</label>
        <input
          id="name"
          v-model="name"
          class="appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
          type="name"
          placeholder="Your recipe's name"
          name="name"
        />
      </div>
      <div class="w-full pt-6 px-5">
        <label for="image" class="text-dark-gray font-bold">Image</label>
        <input
          id="image"
          v-model="imageUrl"
          class="appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
          type="text"
          placeholder="Recipe's image URL"
          name="image"
        />
      </div>
      <div class="w-full pt-6 px-5 flex">
        <div class="pr-5">
          <label for="weight" class="text-dark-gray font-bold">Weight</label>
          <input
            id="weight"
            v-model="totalWeight"
            class="appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
            type="text"
            placeholder="Total Weight"
            name="weight"
          />
        </div>
        <div>
          <label for="calories" class="text-dark-gray font-bold"
            >Calories</label
          >
          <input
            id="calories"
            v-model="totalCalories"
            class="appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
            type="text"
            placeholder="Total Calories"
            name="calories"
          />
        </div>
      </div>
      <form class="w-full pt-6 px-5" @submit.prevent="addIngredient">
        <label for="ingredients" class="text-dark-gray font-bold"
          >Ingredients</label
        >
        <div class="flex">
          <input
            id="ingredientText"
            v-model="ingredient.text"
            class="appearance-none rounded w-full py-2 px-4 mr-5 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
            type="text"
            placeholder="Ingredient's name"
            name="ingredientText"
          />
          <input
            id="ingredientWeight"
            v-model="ingredient.weight"
            class="appearance-none rounded w-1/3 py-2 px-4 mr-5 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
            type="text"
            placeholder="Weight"
            name="ingredientWeight"
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
      <div
        v-for="(ingr, index) in ingredients"
        :key="index"
        class="flex w-full px-5 pt-3"
      >
        <h1
          class="appearance-none rounded w-full py-2 px-4 mr-5 leading-tight focus:outline-none border border-dashed border-dark-gray text-heading-primary"
        >
          {{ ingr.text }}
        </h1>
        <h1
          class="appearance-none rounded w-1/3 py-2 px-4 mr-5 leading-tight focus:outline-none text-center border border-dashed border-dark-gray text-heading-primary"
        >
          {{ ingr.weight }}
        </h1>
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
          >
            Create Recipe
          </button>
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
        .then(() => this.$store.dispatch("fetchRecipes"));
    }
  }
};
</script>
