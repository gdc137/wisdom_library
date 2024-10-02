<script>
import axios from 'axios';
import { useRouter } from 'vue-router';

export default {
    data() {
        return {
            email: 'girdharrathod786@gmail.com',
            errorMessage: '',
            router: useRouter()
        }
    },

    methods: {
        async forgot() {
            try {
                await axios.post('/_admin/password/email', {
                    email: this.email,
                }).then((response) => {
                    this.router.push('/_admin')
                    toast.fire({ icon: 'success', title: 'Password reset link send successfuly' })
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
                        <router-link class="brand-logo" to="/_admin">
                            <img src="/assets/img/logo.png" alt="Logo" class="ourlogo">
                        </router-link>
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img
                                    class="img-fluid" src="/admin-app-assets/images/pages/forgot-password-v2.svg"
                                    alt="Forgot password V2" /></div>
                        </div>
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1">Forgot Password? 🔒</h2>
                                <p class="card-text mb-2">Enter your email and we'll send you instructions to reset your
                                    password</p>
                                <form id="forgotPasswordForm" class="auth-forgot-password-form mt-2"
                                    @submit.prevent="forgot">
                                    <div class="mb-1">
                                        <label class="form-label" for="forgot-password-email">Email</label>
                                        <input class="form-control" id="email" type="text"
                                            placeholder="john@example.com" v-model="email" autofocus />
                                        <p class="text-danger" v-if="errorMessage && errorMessage.email">{{ errorMessage.email[0] }}</p>
                                    </div>
                                    <button class="btn btn-primary w-100" tabindex="2">Send reset link</button>
                                </form>

                                <p class="text-center mt-2">
                                    <router-link to="/_admin">
                                        <i class="fa-solid fa-chevron-left"></i> Back to login
                                    </router-link>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>