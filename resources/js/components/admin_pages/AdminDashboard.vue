<script>
import HeaderComp from '../admin_general/HeaderComp.vue';
import SidebarComp from '../admin_general/SidebarComp.vue';
import FooterComp from '../admin_general/FooterComp.vue';
import BodyComp from '../admin_general/BodyComp.vue';
import BreadcrumbComp from '../admin_general/BreadcrumbComp.vue';

export default {

    data() {
        return {
            breadcrumbData: {
                'title': 'Dashboard',
                'path': [],
                'addBtn': false,
            },
        }
    },

    components: {
        HeaderComp,
        SidebarComp,
        FooterComp,
        BodyComp,
        BreadcrumbComp
    },
}

</script>

<template>
    <HeaderComp :page-title=breadcrumbData.title />
    <SidebarComp />

    <body-comp>
        <breadcrumb-comp :data="breadcrumbData"></breadcrumb-comp>

        <div class="row">
            <div class="col-xl-12 col-md-12 col-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">Today's Collection</h4>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-success me-2">
                                        <div class="avatar-content">
                                            <i class="fa-solid fa-users avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0"></h4>
                                        <p class="card-text font-small-3 mb-0">Users</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-info me-2">
                                        <div class="avatar-content">
                                            <i class="fa-solid fa-indian-rupee-sign avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0"></h4>
                                        <p class="card-text font-small-3 mb-0">Transactions</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-danger me-2">
                                        <div class="avatar-content">
                                            <i class="fa-solid fa-money-bill-transfer avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0"></h4>
                                        <p class="card-text font-small-3 mb-0">Withdraw Requests</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-warning me-2">
                                        <div class="avatar-content">
                                            <i class="fa-solid fa-file-invoice avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0"></h4>
                                        <p class="card-text font-small-3 mb-0">Tests</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-md-12 col-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">Statistics</h4>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-warning me-2">
                                        <div class="avatar-content">
                                            <i class="fa-solid fa-users avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0"></h4>
                                        <p class="card-text font-small-3 mb-0">Total Users</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-info me-2">
                                        <div class="avatar-content">
                                            <i class="fa-solid fa-user-check avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0"></h4>
                                        <p class="card-text font-small-3 mb-0">Active Users</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-danger me-2">
                                        <div class="avatar-content">
                                            <i class="fa-solid fa-indian-rupee-sign avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">₹ 344</h4>
                                        <p class="card-text font-small-3 mb-0">Total Withdraw</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-success me-2">
                                        <div class="avatar-content">
                                            <i class="fa-solid fa-indian-rupee-sign avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">₹ 23</h4>
                                        <p class="card-text font-small-3 mb-0">Total Purchase</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body-comp>

    <FooterComp />
</template>