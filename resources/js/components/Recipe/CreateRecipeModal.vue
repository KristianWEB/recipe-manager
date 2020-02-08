<template>
    <modal name="create-recipe" class="shadow-md font-roboto" height="570px">
        <div class="bg-light-gray rounded-t-lg">
            <h1 class="p-6 text-3xl font-bold text-heading-primary text-center">
                Create a Custom Recipe
            </h1>
        </div>
        <form class="w-full bg-white">
            <div class="w-full pt-8 px-5">
                <label for="name" class="text-dark-gray font-bold">Name</label>
                <input
                    class="appearance-none rounded w-full py-2 px-4
                leading-tight focus:outline-none bg-light-gray
                placeholder-input-gray"
                    id="name"
                    type="name"
                    placeholder="Your recipe's name"
                    name="email"
                />
            </div>
            <div class="w-full pt-6 px-5">
                <label for="image" class="text-dark-gray font-bold"
                    >Image</label
                >
                <input
                    class="appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
                    id="image"
                    type="text"
                    placeholder="Recipe's image URL"
                    name="image"
                />
            </div>
            <div class="w-full pt-6 px-5 flex">
                <div class="pr-5">
                    <label for="weight" class="text-dark-gray font-bold"
                        >Weight</label
                    >
                    <input
                        class="appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
                        id="weight"
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
                        class="appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
                        id="calories"
                        type="text"
                        placeholder="Total Calories"
                        name="calories"
                    />
                </div>
            </div>
            <div class="w-full pt-6 px-5">
                <label for="ingredients" class="text-dark-gray font-bold"
                    >Ingredients</label
                >
                <div class="flex">
                    <input
                        class="appearance-none rounded w-full py-2 px-4 mr-5 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
                        id="ingredientName"
                        type="text"
                        placeholder="Ingredient's name"
                        name="ingredientName"
                    />

                    <input
                        class="appearance-none rounded w-1/3 py-2 px-4 mr-5 leading-tight focus:outline-none bg-light-gray placeholder-input-gray"
                        id="ingredientWeight"
                        type="text"
                        placeholder="Weight"
                        name="ingredientWeight"
                    />
                    <button
                        class="border border-dark-gray rounded-full p-1 text-black"
                    >
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
            </div>
            <div class="flex items-center justify-center pt-12 pb-6">
                <div>
                    <button
                        class="shadow text-white py-2 px-16 rounded bg-orange font-medium text-lg"
                        type="submit"
                    >
                        Create Recipe
                    </button>
                </div>
            </div>
        </form>
    </modal>
</template>

<script>
export default {};
</script>
