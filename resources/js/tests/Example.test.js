import { mount } from "@vue/test-utils";
import Recipe from "../components/recipes/Recipe.vue";

describe("Component", () => {
    test("is a Vue instance", () => {
        const wrapper = mount(Recipe);
        expect(wrapper.isVueInstance()).toBeTruthy();
    });
});
