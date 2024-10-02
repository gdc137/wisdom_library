<script>
import axios from 'axios';

export default {
    data() {
        return {
            email: 'girdharrathod786@gmail.com',
            password: 'test123test',
            errorMessage: '',
        }
    },

    methods: {
        async login() {
            try {
                await axios.post('/_admin/login', {
                    email: this.email,
                    password: this.password,
                }).then((response) => {
                    window.location.href = '/_admin/dashboard';
                    toast.fire({ icon: 'success', title: 'Login successfull' })
                })
            } catch (error) {
                if (error.response.status === 422) {
                    this.errorMessage = error.response.data.errors;
                }
            }
        },
    }
}
</script>

<template>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <a class="brand-logo" href="_admin/login">
                            <img src="assets/img/logo.png" alt="Logo" class="ourlogo">
                        </a>

                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                                <img class="img-fluid" src="admin-app-assets/images/pages/user-login.png"
                                    alt="Login V2" />
                            </div>
                        </div>

                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1">Welcome to Wisdom Library Admin Panel</h2>
                                <p class="card-text mb-2">Please sign-in to your account</p>
                                <form id="login-form" class="auth-login-form mt-2" @submit.prevent="login">

                                    <div class="mb-1">
                                        <label class="form-label" for="email">Email</label>
                                        <input class="form-control" id="email" type="email" v-model="email"
                                            placeholder="john@example.com" aria-describedby="login-email" autofocus
                                            autocomplete="false" tabindex="1" />
                                        <p class="text-danger" v-if="errorMessage && errorMessage.email">{{
                                            errorMessage.email[0] }}</p>
                                    </div>
                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="password">Password</label>
                                            <a href="admin/forgetpassword">
                                                <small>Forgot Password?</small>
                                                <!-- href="password.request" -->
                                            </a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password" type="password"
                                                v-model="password" placeholder="············"
                                                aria-describedby="password" autocomplete="false" tabindex="2" />
                                            <span class="input-group-text cursor-pointer">
                                                <i class="fa-solid fa-eye"></i>
                                            </span>
                                        </div>
                                        <p class="text-danger" v-if="errorMessage && errorMessage.password">{{
                                            errorMessage.password[0] }}</p>
                                    </div>

                                    <button class="btn btn-primary w-100" tabindex="4">Sign in</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
