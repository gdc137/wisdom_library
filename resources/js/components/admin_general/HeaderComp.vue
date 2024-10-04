<script setup>
import axios from 'axios';

const logout = async () => {
    await axios.post("/_admin/logout").then(() => {
        window.location.href = '/_admin'
        oast.fire({ icon: 'success', title: 'Logout success' })
    })
}

const title = defineProps(['page-title'])

</script>

<template>
    <nav
        class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item">
                        <a class="nav-link menu-toggle" href="#"><i class="fa-solid fa-bars"></i></a>
                    </li>
                </ul>
                <h2 class="m-0" style="font-weight: 800;" id="page_title">{{ title.pageTitle }}</h2>
            </div>

            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name fw-bolder">Admin</span>
                        </div>
                        <span class="avatar">
                            <img class="round" src="/admin-assets/img/profile.jpg" alt="avatar" height="40" width="40">
                            <span class="avatar-status-online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <form @submit.prevent="logout">
                            <button class="dropdown-item w-100" type="submit">
                                <i class="fa-solid fa-arrow-right-from-bracket me-50"></i> Logout
                            </button>
                        </form>
                    </div>
                </li>
            </ul>

        </div>
    </nav>
</template>

<style>
.dropdown-menu {
    width: 15rem !important;
}
</style>