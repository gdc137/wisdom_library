<script>
import axios from 'axios';
import { useRouter } from 'vue-router';

export default {
    data() {
        return {
            token: '',
            email: '',
            password: '',
            confirmPassword: '',
            errorMessage: '',
            router: useRouter(),
        }
    },

    methods: {
        async reset() {
            try {
                await axios.post('/_admin/password/reset', {
                    token: this.token,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.confirmPassword,
                })
                    .then((res) => {
                        this.router.push('/_admin')
                        toast.fire({ icon: 'success', title: res.data.message })
                    })
            } catch (error) {
                if (error.response.status === 422) {
                    this.errorMessage = error.response.data.errors;
                }
            }

        }
    },

    mounted() {
        this.token = this.$route.params.token
        this.email = this.$route.query.email
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
                        <!-- Brand logo-->
                        <router-link class="brand-logo" to="/_admin">
                            <img src="/assets/img/logo.png" alt="Logo" class="ourlogo">
                        </router-link>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img
                                    class="img-fluid" src="/admin-app-assets/images/pages/reset-password-v2.svg"
                                    alt="Register V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Reset password-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1">Reset Password 🔒</h2>
                                <p class="card-text mb-2">Your new password must be different from previously used
                                    passwords</p>

                                <form id="resetPasswordForm" class="auth-reset-password-form mt-2"
                                    @submit.prevent="reset">
                                    <input type="hidden" v-model="token">

                                    <div class="mb-1">
                                        <label class="form-label" for="email">Email</label>
                                        <input class="form-control" id="email" type="email" v-model="email"
                                            placeholder="john@example.com" autocomplete="false" />
                                        <p class="text-danger" v-if="errorMessage && errorMessage.email">{{
                                            errorMessage.email[0] }}</p>
                                    </div>

                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="password">New Password</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password" type="password"
                                                v-model="password" placeholder="············" autofocus tabindex="1"
                                                autocomplete="new-password" />
                                            <span class="input-group-text cursor-pointer">
                                                <i class="fa-solid fa-eye"></i>
                                            </span>
                                        </div>
                                        <p class="text-danger" v-if="errorMessage && errorMessage.password">{{
                                            errorMessage.password[0] }}</p>
                                    </div>
                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="password_confirmation">Confirm
                                                Password</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password_confirmation"
                                                type="password" v-model="confirmPassword" placeholder="············"
                                                tabindex="2" autocomplete="new-password" /><span
                                                class="input-group-text cursor-pointer"><i
                                                    class="fa-solid fa-eye"></i></span>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100" tabindex="3">Set New
                                        Password</button>
                                </form>

                                <p class="text-center mt-2">
                                    <router-link to="/_admin">
                                        <i class="fa-solid fa-chevron-left"></i> Back to login
                                    </router-link>
                                </p>
                            </div>
                        </div>
                        <!-- /Reset password-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>