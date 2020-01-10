import { configure } from "@storybook/vue";
import "./utils.css";

configure(require.context("../resources", true, /\.stories\.js$/), module);
