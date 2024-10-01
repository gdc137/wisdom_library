import { createRouter, createWebHistory } from "vue-router";

import DashboardIndex from "../components/dashboard/index.vue";
import DashboardFrom from "../components/dashboard/Form.vue"
import NotFound from "../components/NotFound.vue"

const routes = [
    { path: "/", name: "dashboard.index", component: DashboardIndex },
    { path: "/books/add", name: "dashboard.form", component: DashboardFrom },
    { path: "/books/:id/edit", name: "books.edit", component: DashboardFrom },
    { path: "/:pathMatch(.*)*", name: "notfound", component: NotFound },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
