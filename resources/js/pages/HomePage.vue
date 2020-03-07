<template>
	<div>
		<NavBar />
		<div class="flex w-full">
			<FilterForm v-if="!mobile" @searchData="search" class="desktopMax:hidden w-1/5" />
			<FilterFormMobile v-if="mobile" @searchData="search" />
			<RecipeList :recipes="recipes" class="w-4/5"/>
		</div>
	</div>
</template>

<script>
import NavBar from "../components/NavBar/NavBar";
import RecipeList from "../components/Recipe/RecipeList";
import FilterForm from "../components/FilterForm/FilterForm";
import FilterFormMobile from "../components/FilterForm/FilterFormMobile";
export default {
	name: "home-page",
	components: {
		NavBar,
		RecipeList,
		FilterForm,
		FilterFormMobile
	},
	data() {
		return {
			recipes: [],
			mobile: window.innerWidth <= 1280
		};
	},
	created() {
		addEventListener("resize", () => (this.mobile = innerWidth <= 1280));

		const appId = process.env.MIX_APP_ID;
		const appKey = process.env.MIX_APP_KEY;
		axios
			.get(
				`https://api.edamam.com/search?q=chocolate&app_id=${appId}&app_key=${appKey}&from=0&to=12`,
				{
					"Access-Control-Allow-Origin": "*"
				}
			)
			.then(({ data }) => (this.recipes = data.hits))
			.catch(error => console.log(error));
	},
	methods: {
		search(searchData) {
			this.recipes = searchData;
		}
	}
};
</script>
