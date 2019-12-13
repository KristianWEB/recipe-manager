import { configure } from "@storybook/vue";
import Vue from "vue";
import RegisterForm from "../resources/js/components/RegisterForm/RegisterForm.vue";
Vue.component("register-form", RegisterForm);
import "./utils.css";

configure(require.context("../resources", true, /\.stories\.js$/), module);
