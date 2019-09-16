<template>
  <div class="w-auto h-auto rounded overflow-hidden shadow-lg mx-5 mb-5">
    <img class="w-full" :src="imageUrl" :alt="title" />
    <div class="px-6 py-4">
      <h2 class="font-bold text-xl mb-2" v-text="title"></h2>
      <h4 class="text-gray-700 text-base">Ingredients:</h4>
      <ul v-if="parseJson">
        <li v-for="(item,index) in JSON.parse(ingredients).slice(0,4)" :key="index">{{ item.text }}</li>
      </ul>
      <ul v-else>
        <li v-for="(item,index) in ingredients.slice(0,4)" :key="index">{{ item.text }}</li>
      </ul>Diet Labels:
      <ul v-if="checkArray(dietLabels)">
        <li v-for="(diet,dietId) in dietLabels" :key="dietId">
          <span>{{ diet }}</span>
        </li>
      </ul>
      <div v-else>
        <span>{{ dietLabels }}</span>
      </div>Calories:
      <ul>
        <li>{{calories}}</li>
      </ul>
      <div class="flex items-center justify-end">
        <a target="_blank" :href="sourceUrl">Read More</a>
        <button
          @click="authenticateUser(imageUrl, title, ingredients, dietLabels, calories)"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold ml-3 py-2 px-4 rounded"
        >Save</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: [
    "title",
    "imageUrl",
    "calories",
    "dietLabels",
    "ingredients",
    "sourceUrl",
    "parseJson"
  ],

  methods: {
    authenticateUser(...recipeData) {
      if (recipeData[3].length === 0) {
        recipeData[3] = "None";
      }

      axios
        .get("/storage")
        .then(() => {
          axios
            .post("/recipes", {
              image: recipeData[0],
              title: recipeData[1],
              ingredients: recipeData[2],
              diet_label: recipeData[3].toString(),
              calories: recipeData[4]
            })
            .then(res => console.log(res.config.data))
            .catch(err => console.log(err.response));
        })
        .catch(() => {
          this.$modal.show("login");
        });
    },
    checkArray(ingredients) {
      if (ingredients instanceof Array) {
        return true;
      }
      return false;
    }
  }
};
</script>

<style scoped>
</style>