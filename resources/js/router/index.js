import { createRouter, createWebHistory } from "vue-router";

import HomeComp from "../components/pages/HomeComp.vue";
import NotFound from "../components/pages/NotFound.vue"
import AdminLogin from "../components/admin/LoginForm.vue"
import AdminDashboard from "../components/admin/Dashboard.vue"

// import DashboardIndex from "../components/dashboard/index.vue";
// import DashboardFrom from "../components/dashboard/Form.vue"

const routes = [
    { path: "/", name: "dashboard.index", component: HomeComp },

    { path: "/_admin", name: "admin.login", component: AdminLogin },
    { path: "/_admin/dashboard", name: "admin.dashboard", component: AdminDashboard },
    
    { path: "/:pathMatch(.*)*", name: "notfound", component: NotFound },
    // { path: "/books/add", name: "dashboard.form", component: DashboardFrom },
    // { path: "/books/:id/edit", name: "books.edit", component: DashboardFrom },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
