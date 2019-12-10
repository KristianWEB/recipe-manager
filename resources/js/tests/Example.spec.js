// test("it works", () => {
//     expect(1 + 1).toBe(2);
// });

import { mount } from "@vue/test-utils";
import Home from "../components/Home.vue";

describe("Component", () => {
    test("is a Vue instance", () => {
        const wrapper = mount(Home);
        expect(wrapper.isVueInstance()).toBeTruthy();
    });
});
