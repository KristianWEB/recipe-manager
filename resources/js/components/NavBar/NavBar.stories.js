import NavBar from "./NavBar";
import { storiesOf } from "@storybook/vue";

storiesOf("NavBar", module).add("default", () => {
    return {
        components: { NavBar },
        template: "<NavBar />"
    };
});
