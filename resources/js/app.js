// import "./bootstrap";
import { createApp } from "vue";
import axios from "axios";

import Swal from "sweetalert2";

window.Swal = Swal;
const toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
});
window.toast = toast;

axios.defaults.headers.common["X-CSRF-TOKEN"] = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");
axios.defaults.withCredentials = true;

import App from "./components/App.vue";
import router from "./router";

const app = createApp(App);
app.use(router);
app.mount("#app");
