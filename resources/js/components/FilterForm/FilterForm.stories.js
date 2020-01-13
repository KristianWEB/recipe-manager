import FilterForm from "./FilterForm";
import { storiesOf } from "@storybook/vue";

storiesOf("Filter Form", module).add("default", () => {
    return {
        components: { FilterForm },
        template: "<FilterForm />"
    };
});
