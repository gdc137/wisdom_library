<template>
    <nav class="navbar navbar-expand-lg navbar-dark px-0 py-1 navbar-cstyle">
        <div class="container-xl">
            <!-- Logo -->
            <RouterLink class="navbar-brand" to="/">
                <img src="assets/img/logo.png" class="h-8" height="60" alt="...">
            </RouterLink>
            <!-- Navbar toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <!-- Nav -->
                <div class="navbar-nav ms-lg-auto">
                    <a class="nav-item nav-link active" href="#" aria-current="page">Home</a>
                    <a class="nav-item nav-link" href="#">Product</a>
                    <a class="nav-item nav-link" href="#">Features</a>
                    <a class="nav-item nav-link" href="#">Pricing</a>
                </div>
            </div>
        </div>
    </nav>
</template>

<style>
.navbar-cstyle {
    /* background-color: #41B3A2; */
    /* background-color: #8C3061; */
    background-color: #9B86BD;
}
</style>
