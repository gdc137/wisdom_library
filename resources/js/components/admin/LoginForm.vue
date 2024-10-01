<!-- <template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form method="POST" action="login">

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control is-invalid" name="email" value=""
                                        required autocomplete="email" autofocus>

                                    <span class="invalid-feedback" role="alert">
                                        <strong>test message</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control  is-invalid "
                                        name="password" required autocomplete="current-password">

                                    <span class="invalid-feedback" role="alert">
                                        <strong>test message</strong>
                                    </span>
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="password.request">
                                        Forget your password
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template> -->



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
                        <a class="brand-logo" href="/">
                            <img src="" alt="Logo" class="ourlogo">
                        </a>
                        <!-- /Brand logo-->

                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                                <img class="img-fluid" src=""
                                    alt="Login V2" />
                            </div>
                        </div>

                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1">Welcome to Unispeak Admin Panel</h2>
                                <p class="card-text mb-2">Please sign-in to your account</p>
                                <form id="login-form" class="auth-login-form mt-2" action=""
                                    method="POST">
                                    <p class="text-success">x</p>
                                    <div class="mb-1">
                                        <label class="form-label" for="email">Email</label>
                                        <input class="form-control" id="email" type="email" name="email"
                                            placeholder="john@example.com" value=""
                                            aria-describedby="login-email" tabindex="1" />
                                        <p class="text-danger"></p>
                                    </div>
                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="login-password">Password</label><a
                                                href=""><small>Forgot
                                                    Password?</small></a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password" type="password"
                                                name="password" placeholder="············" aria-describedby="password"
                                                tabindex="2" autocomplete="new-password" /><span
                                                class="input-group-text cursor-pointer"><i
                                                    class="fa-solid fa-eye"></i></span>
                                        </div>
                                        <p class="text-danger"></p>
                                    </div>

                                    <button class="btn btn-primary w-100" tabindex="4">Sign in</button>
                                </form>
                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>