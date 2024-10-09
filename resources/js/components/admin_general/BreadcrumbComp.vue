<script>
export default {
    props: {
        data: Object
    }
};
</script>

<template>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0 d-none">
                        {{ data.title }}
                    </h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" v-for="singlePath in data.path">
                                <router-link :to="singlePath.route">{{ singlePath.name }}</router-link>
                            </li>
                            <li class="breadcrumb-item active">{{ data.title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-header-right text-md-end col-md-3 col-12 d-md-block" v-if="data.addBtn">
            <div class="mb-1 breadcrumb-right">
                <div class="dropdown">
                    <button type="button" class="btn btn-relief-primary" data-bs-toggle="modal"
                        data-bs-target="#addItemModal" ref="OpenModal"><i class="fa-solid fa-plus"></i> Add</button>
                </div>
            </div>
        </div>
    </div>
</template>