<template>
  <div class="font-roboto bg-bg-gray">
    <form
      class="rounded px-8 pt-6 pb-8 mb-4"
      @submit.prevent="detailedSearching"
    >
      <h3 class="text-xl font-medium pb-6 mb-0">Filters</h3>
      <div class="mb-4">
        <label
          class="block text-dark-gray text-sm font-bold mb-2"
          for="username"
          >Search by Keyword</label
        >
        <input
          id="username"
          v-model="form.keyword"
          class="shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
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
          class="shadow appearance-none border rounded w-full py-2 px-3 text-dark-gray leading-tight focus:outline-none focus:shadow-outline"
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
            class="shadow border text-dark-gray block appearance-none w-full py-3 px-4 pr-8 rounded leading-tight focus:outline-none"
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
          class="shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
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
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          type="text"
        />
      </div>
      <div class="flex items-center justify-end">
        <button
          class="py-1 px-4 rounded-lg focus:outline-none focus:shadow-outline border text-outline border-outline font-medium"
          type="submit"
        >
          Search
        </button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        keyword: "",
        calories: null,
        dietLabel: "balanced",
        result: null,
        cookingTime: null
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
