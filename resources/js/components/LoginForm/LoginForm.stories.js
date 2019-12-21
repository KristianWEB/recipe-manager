import LoginForm from "./LoginForm";
import { storiesOf } from "@storybook/vue";

storiesOf("Login Form", module).add("default", () => {
    return {
        components: { LoginForm },
        template: "<LoginForm />"
    };
});
