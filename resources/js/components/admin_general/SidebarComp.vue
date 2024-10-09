<script>
import { ref, watchEffect } from 'vue';
import { useRoute } from 'vue-router';

export default {
    setup() {
        const route = useRoute();
        const currentRoute = ref(route.path);

        watchEffect(() => {
            currentRoute.value = route.path;
        });

        return {
            currentRoute,
        };
    },
};
</script>

<template>
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto mainlogoarea">
                    <router-link class="navbar-brand" to="/_admin/dashboard">
                        <span class="brand-logo">
                            <img class="mainlogoimage" src="/assets/img/logo.png" alt="Logo">
                        </span>
                        <h2 class="brand-text mainlogotext"> Wisdom Library</h2>
                    </router-link>
                </li>
                <li class="nav-item nav-toggle mainlogocollpasearea">
                    <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                        <i class="d-block d-xl-none text-primary toggle-icon font-medium-4 fa-solid fa-x"></i>
                        <i
                            class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary  fa-solid fa-compact-disc"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="shadow-bottom"></div>

        <div class="main-menu-content mt-1">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item" :class="{ active: currentRoute === '/_admin/dashboard' }">
                    <router-link class="d-flex align-items-center" to="/_admin/dashboard">
                        <i class="fa-solid fa-home"></i>
                        <span class="menu-title text-truncate" data-i18n="home">Dashboard</span>
                    </router-link>
                </li>

                <li class="nav-item" :class="{ active: currentRoute === '/_admin/scriptures' }">
                    <router-link class="d-flex align-items-center" to="/_admin/scriptures">
                        <i class="fa-solid fa-book"></i>
                        <span class="menu-title text-truncate" data-i18n="scriptures">Scriptures</span>
                    </router-link>
                </li>

                <li class="nav-item" :class="{ active: currentRoute === '/_admin/languages' }">
                    <router-link class="d-flex align-items-center" to="/_admin/languages">
                        <i class="fa-solid fa-language"></i>
                        <span class="menu-title text-truncate" data-i18n="language">Languages</span>
                    </router-link>
                </li>
            </ul>
        </div>
    </div>

</template>