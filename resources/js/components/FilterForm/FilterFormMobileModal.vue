<template>
  <modal
    name="detailed-searching"
    class="w-full font-roboto"
    height="auto"
    :adaptive="true"
  >
    <div class="bg-light-gray w-full flex items-center justify-end">
      <h3 class="text-xl m-auto font-medium py-3 mb-0">
        Search for a recipe
      </h3>
      <button
        class="text-4xl text-outline px-3"
        @click="$modal.hide('detailed-searching')"
      >
        &times;
      </button>
    </div>
    <form class="rounded px-8 py-5" @submit.prevent="detailedSearching">
      <div class="mb-4">
        <label
          class="block text-dark-gray text-sm font-bold mb-2"
          for="username"
          >Search by Keyword</label
        >
        <input
          id="username"
          v-model="form.keyword"
          class="appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
          type="text"
        />
      </div>
      <div class="mb-4">
        <label
          class="block text-dark-gray text-sm font-bold mb-2"
          for="calories"
          >Search by Calories per Serving</label
        >
        <input
          id="calories"
          v-model="form.calories"
          class="appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
          type="number"
        />
      </div>
      <div class="mb-4">
        <label
          class="block text-dark-gray text-sm font-bold mb-2"
          for="grid-state"
          >Pick a Diet label</label
        >
        <div class="relative">
          <select
            id="dietLabel"
            v-model="form.dietLabel"
            class="appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
          >
            <option value="balanced">Balanced</option>
            <option value="high-protein">High-Protein</option>
            <option value="high-fiber">High-Fiber</option>
            <option value="low-carb">Low-Carb</option>
            <option value="low-fat">Low-Fat</option>
            <option value="low-sodium">Low-Sodium</option>
          </select>
          <div
            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
          >
            <svg
              class="fill-current h-4 w-4"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <path
                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
              />
            </svg>
          </div>
        </div>
      </div>
      <div class="mb-4">
        <label class="block text-dark-gray text-sm font-bold mb-2" for="result"
          >How many recipes?</label
        >
        <input
          id="result"
          v-model="form.result"
          class="appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
          type="number"
        />
      </div>
      <div class="mb-4">
        <label
          class="block text-dark-gray text-sm font-bold mb-2"
          for="username"
          >Cooking time ( Minutes )</label
        >
        <input
          id="cookingTime"
          v-model="form.cookingTime"
          class="appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
          type="text"
        />
      </div>
      <div class="flex items-center justify-center">
        <button
          class="shadow text-white py-2 px-8 rounded bg-orange font-medium text-lg"
          type="submit"
        >
          Search
        </button>
      </div>
    </form>
  </modal>
</template>

<script>
export default {
  data() {
    return {
      form: {
        keyword: "",
        calories: null,
        dietLabel: "balanced",
        cookingTime: null,
        result: null
      }
    };
  },
  methods: {
    detailedSearching() {
      const appId = process.env.MIX_APP_ID;
      const appKey = process.env.MIX_APP_KEY;

      axios
        .get(
          `https://api.edamam.com/search?q=${this.form.keyword}&app_id=${appId}&app_key=${appKey}&from=0&to=${this.form.result}&calories=${this.form.calories}&diet=${this.form.dietLabel}&time=${this.form.cookingTime}`,
          {
            "Access-Control-Allow-Origin": "*"
          }
        )
        .then(({ data }) => this.$emit("searchData", data.hits));
    }
  }
};
</script>
