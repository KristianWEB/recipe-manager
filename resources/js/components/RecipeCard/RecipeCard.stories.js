import RecipeCard from "./RecipeCard";
import { storiesOf } from "@storybook/vue";

storiesOf("RecipeCard", module).add("default", () => {
    return {
        components: { RecipeCard },
        template: "<RecipeCard />"
    };
});
