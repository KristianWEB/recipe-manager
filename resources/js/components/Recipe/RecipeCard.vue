<template>
  <div
    class="rounded-lg w-full overflow-hidden shadow font-roboto relative z-4"
  >
    <img
      class="w-full h-64 object-cover"
      :src="recipe.image"
      :alt="recipe.label"
    />
    <div
      class="absolute top-0 right-0 text-white flex justify-center items-center"
    >
      <button
        v-if="!recipe.is_saved"
        class="mr-6 mt-4"
        @click="saveRecipe(recipe)"
      >
        <img
          svg-inline
          width="35px"
          height="35px"
          src="../../../../public/images/heart.svg"
          alt="heart icon"
        />
      </button>
      <button v-else class="mr-6 mt-4" @click="deleteRecipe(recipe)">
        <img
          svg-inline
          fill="red"
          width="35px"
          height="35px"
          src="../../../../public/images/heartFill.svg"
          alt="heart icon"
        />
      </button>
    </div>
    <div class="flex justify-center items-center">
      <div class="w-auto bg-white z-10 py-2 px-4 mx-8 -mt-12 shadow rounded-lg">
        <h1 class="font-bold text-xl text-heading-primary text-center">
          {{ recipe.label }}
        </h1>
        <div class="flex justify-center">
          <img
            svg-inline
            src="../../../../public/images/calculator.svg"
            alt="calculator"
            width="25"
            height="25"
            class="pb-1"
          />
          <h6 class="font-medium text-orange mr-6">
            {{ Math.round(recipe.calories) }}cal
          </h6>
          <img
            svg-inline
            src="../../../../public/images/weight.svg"
            alt="weight"
            width="25"
            height="25"
            class="pr-1"
          />
          <h6 v-if="recipe.totalWeight" class="font-medium text-orange">
            {{ Math.round(recipe.totalWeight) }}g
          </h6>
          <h6 v-if="recipe.weight" class="font-medium text-orange">
            {{ Math.round(recipe.weight) }}g
          </h6>
        </div>
      </div>
    </div>
    <div class="mx-6 mt-6">
      <p
        class="text-heading-primary text-base font-bold inline pb-1 border-b-1 border-black"
      >
        Ingredients
      </p>
    </div>
    <ul class="px-6 p-3 mt-1 flex flex-wrap bg-light-gray">
      <li
        v-for="(ingredient, index) in recipe.ingredients.slice(0, 4)"
        :key="index"
        class="flex flex-col w-1/2 pr-3 pb-3"
      >
        <p class="text-sm text-heading-primary">
          {{ ingredient.text }}
        </p>
        <div class="flex">
          <img
            svg-inline
            src="../../../../public/images/weight.svg"
            width="20"
            height="20"
          />
          <p class="text-sm font-bold text-input-gray ml-2">
            {{ Math.round(ingredient.weight) }}g
          </p>
        </div>
      </li>
    </ul>
    <div
      v-if="recipe.url"
      class="flex justify-end bg-light-gray pr-6 pb-3 pt-2"
    >
      <a :href="recipe.url" target="_blank" class="font-medium text-orange"
        >READ MORE</a
      >
    </div>
  </div>
</template>

<script>
export default {
  props: {
    recipe: {
      type: Object,
      default: null
    }
  },
  methods: {
    saveRecipe(recipe) {
      axios.post("/api/save-recipe", {
        ...recipe,
        isSaved: true
      });
    },
    deleteRecipe(recipe) {
      axios
        .post("/api/delete-recipe", recipe)
        .then(() => this.$store.dispatch("fetchRecipes"));
    }
  }
};
</script>
