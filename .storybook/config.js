import { configure } from "@storybook/vue";
import Vue from "vue";
import RegisterForm from "../resources/js/components/RegisterForm/RegisterForm.vue";
Vue.component("register-form", RegisterForm);
import "../public/css/app.css";

// automatically import all files ending in *.stories.js
configure(require.context("../resources", true, /\.stories\.js$/), module);
