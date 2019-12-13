import RegisterForm from "./RegisterForm";
import { storiesOf } from "@storybook/vue";

storiesOf("Register Form", module).add("default", () => {
    return {
        components: { RegisterForm },
        template: "<RegisterForm />"
    };
});
