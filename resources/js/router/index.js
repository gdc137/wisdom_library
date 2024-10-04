import { createRouter, createWebHistory } from "vue-router";

import HomeComp from "../components/pages/HomeComp.vue";
import NotFound from "../components/pages/NotFound.vue"

import AdminLogin from "../components/admin_pages/AdminLogin.vue"
import AdminForgotpassword from "../components/admin_pages/AdminForgotpassword.vue";
import AdminResetpassword from "../components/admin_pages/AdminResetpassword.vue";
import AdminDashboard from "../components/admin_pages/AdminDashboard.vue";
import AdminPagenotfound from "../components/admin_pages/AdminPagenotfound.vue";
import AdminLangugaes from "../components/admin_pages/AdminLangugaes.vue";

// import DashboardIndex from "../components/dashboard/index.vue";
// import DashboardFrom from "../components/dashboard/Form.vue"

const routes = [
    { path: "/", name: "dashboard.index", component: HomeComp },

    
    // admin routes 
    { path: "/_admin", name: "admin.login", component: AdminLogin },
    { path: "/_admin/password/reset", name: "admin.forgotpassword", component: AdminForgotpassword },
    { path: "/_admin/password/reset/:token", name: "admin.resetpassword", component: AdminResetpassword },

    { path: "/_admin/dashboard", name: "admin.dashboard", component: AdminDashboard },
    { path: "/_admin/languages", name: "admin.languages", component: AdminLangugaes },


    { path: "/_admin/:pathMatch(.*)*", name: "admin.notfound", component: AdminPagenotfound },
    { path: "/:pathMatch(.*)*", name: "notfound", component: NotFound },
    
    // { path: "/books/add", name: "dashboard.form", component: DashboardFrom },
    // { path: "/books/:id/edit", name: "books.edit", component: DashboardFrom },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
