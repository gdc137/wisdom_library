<script>
import axios from 'axios';
import HeaderComp from '../admin_general/HeaderComp.vue';
import SidebarComp from '../admin_general/SidebarComp.vue';
import FooterComp from '../admin_general/FooterComp.vue';
import BodyComp from '../admin_general/BodyComp.vue';
import BreadcrumbComp from '../admin_general/BreadcrumbComp.vue';
import DatatableComp from '../admin_general/DatatableComp.vue';

export default {

    data() {
        return {
            breadcrumbData: {
                'title': 'Languages',
                'path': [{ 'name': 'Dashboard', 'route': '/_admin/dashboard' }],
                'addBtn': true,
            },
            columns: [
                { data: 'id', title: 'Id' },
                { data: 'name', title: 'Name' },
                {
                    data: null, title: 'Active Status', render: (data, type, row) => {

                        return `<button class="btn btn-${row.active_status == 1 ? 'success' : 'danger'} btn-sm" @click="changestatus(${row.id})">${row.active_status == 1 ? 'Active' : 'Deactive'}</button>`
                    }
                },
                {
                    title: 'Actions',
                    data: null,
                    render: (data, type, row) => {
                        return `<button class="btn btn-primary btn-sm" v-on:click="showlog">Edit</button>
                                <button class="btn btn-danger btn-sm" data-id="${row.id}" data-action="delete">Delete</button>`
                    }
                }
            ],
            res: '',
            errorMessage: '',
        }
    },

    methods: {
        fetchData() {
            axios.get('/_admin/languages/get').then((response) => {
                this.res = response.data.data
            }).catch(e => {
                this.errorMessage = e.response.data.message
            })
        },
        editItem(id) {
            console.log(`Edit user with ID: ${id}`);
            // Handle the edit logic here
        },
        deleteItem(id) {
            console.log(`Delete user with ID: ${id}`);
            // Handle the delete logic here
        },
    },

    created() {
        this.fetchData(); // Fetch data when the component is created
    },

    components: {
        HeaderComp,
        SidebarComp,
        FooterComp,
        BodyComp,
        BreadcrumbComp,
        DatatableComp
    },


}

</script>

<template>
    <HeaderComp :page-title=breadcrumbData.title />
    <SidebarComp />

    <body-comp>
        <breadcrumb-comp :data="breadcrumbData"></breadcrumb-comp>

        <section id="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <DatatableComp :columns=columns :tableData=res @editItem="editItem" @deleteItem="deleteItem" />
                    </div>
                </div>
            </div>
        </section>
    </body-comp>

    <FooterComp />
</template>
