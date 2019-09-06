<template>
  <div>
    <search @recipeData="detailedSearching"></search>
    <div class="flex justify-end mt-6 mx-8">
      <button
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        @click="$modal.show("search")"
      >Search</button>
    </div>
    <div class="flex flex-wrap w-full justify-center mt-5">
      <div
        v-for="(ingredient, index) in recipe.ingredients"
        :key="index"
        class="card-width rounded overflow-hidden shadow-lg mx-5 mb-5"
      >
        <img class="w-full" :src="recipe.imageURL[index]" :alt="recipe.title[index]" />
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2">{{ recipe.title[index] }}</div>
          <h3 class="text-gray-700 text-base">
            Ingredients:
            <ul>
              <li v-for="(item,index) in ingredient.slice(0,6)" :key="index">{{ item }}</li>
            </ul>Diet Labels:
            <ul>
              <li v-for="(diet,dietId) in recipe.dietLabels" :key="dietId">
                <!-- recipe.dietLabels[index][dietId] -->
                {{
                recipe.dietLabels[index][dietId]
                }}
              </li>
            </ul>Calories:
            <ul>
              <li>{{recipe.calories[index]}}</li>
            </ul>
          </h3>
          <div class="flex items-center justify-end">
            <a target="_blank" :href="recipe.sourceURL[index]">Read More</a>
            <button
              @click="authenticateUser"
              class="bg-blue-500 hover:bg-blue-700 text-white font-bold ml-3 py-2 px-4 rounded"
            >Save</button>
          </div>
        </div>
      </div>
    </div>
    <login></login>
  </div>
</template>

<script>
export default {
  data() {
    return {
      recipe: {
        title: [],
        imageURL: [],
        calories: [],
        dietLabels: [],
        ingredients: [],
        sourceURL: []
      }
    };
  },
  created() {
    const appId = process.env.RECIPE_ID;
    const appKey = process.env.RECIPE_KEY;
    axios
      .get(
        `https://api.edamam.com/search?q=chocolate&app_id=${appId}&app_key=${appKey}&from=0&to=9`
      )
      .then(({ data }) => {
        data.hits.forEach(({ recipe }) => {
          this.pushRecipeItems(this.recipe, recipe);
        });
      });
  },
  methods: {
    pushRecipeItems(dataArr, newItems) {
      dataArr.title.push(newItems.label);
      dataArr.imageURL.push(newItems.image);
      dataArr.dietLabels.push(newItems.dietLabels);
      dataArr.calories.push(newItems.calories);
      dataArr.ingredients.push(newItems.ingredientLines);
      dataArr.sourceURL.push(newItems.url);
    },

    authenticateUser() {
      axios
        .get("/storage")
        .then(() => {
          window.location.pathname = "/storage";
        })
        .catch(() => {
          this.$modal.show("login");
        });
    },

    detailedSearching(data) {
      const appId = process.env.RECIPE_ID;
      const appKey = process.env.RECIPE_KEY;

      Object.keys(this.recipe).forEach(element => {
        this.recipe[element] = [];
      });

      axios
        .get(
          `https://api.edamam.com/search?q=${
            data.name
          }&app_id=${appId}&app_key=${appKey}&from=0&to=${Number(
            data.results
          )}&calories=${data.calories}&cuisineType=${data.cuisineType}&diet=${
            data.dietLabels
          }&time=${data.cookingTime}`
        )
        .then(({ data }) => {
          data.hits.forEach(({ recipe }) => {
            this.pushRecipeItems(this.recipe, recipe);
          });
        })
        .catch(err => console.log(err));
      this.$modal.hide("search");
    }
  }
};
// recipe title, diet label, health label, calories
</script>

