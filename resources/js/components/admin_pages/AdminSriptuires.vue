<script>
import axios from 'axios';
import HeaderComp from '../admin_general/HeaderComp.vue';
import SidebarComp from '../admin_general/SidebarComp.vue';
import FooterComp from '../admin_general/FooterComp.vue';
import BodyComp from '../admin_general/BodyComp.vue';
import BreadcrumbComp from '../admin_general/BreadcrumbComp.vue';
import DatatableComp from '../admin_general/DatatableComp.vue';
import ModalComp from '../admin_general/ModalComp.vue';
import DeleteItemComp from '../admin_general/DeleteItemComp.vue';
import ScriptureForm from '../scripture/ScriptureForm.vue';

export default {

    data() {
        return {
            breadcrumbData: {
                'title': 'Scriptures',
                'path': [{ 'name': 'Dashboard', 'route': '/_admin/dashboard' }],
                'addBtn': true,
            },
            columns: [
                { data: 'id', title: 'Id' },
                { data: 'title', title: 'Title' },
                {
                    data: null, title: 'Active Status', render: (data, type, row) => {

                        return `<button class="btn btn-${row.active_status == 1 ? 'success' : 'danger'} btn-sm"  data-id="${row.id}" data-action="changeStatus">${row.active_status == 1 ? 'Active' : 'Deactive'}</button>`
                    }
                },
                {
                    title: 'Actions',
                    data: null,
                    render: (data, type, row) => {
                        return `<div class="d-flex flex-row"><button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                                data-bs-target="#editItemModal" data-id="${row.id}" data-action="edit">Edit</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="${row.id}" data-action="delete">Delete</button></div>`
                    }
                }
            ],
            res: '',
            editId: '',
            deleteId: '',
            errorMessage: '',
        }
    },

    methods: {
        fetchData() {
            axios.get('/_admin/scriptures/get').then((response) => {
                this.res = response.data.data
            }).catch(e => {
                this.errorMessage = e.response.data.message
            })
        },

        editItem(id) {
            this.editId = id
        },

        deleteItem(id) {
            this.deleteId = id;
        },

        deleteConfirm(id) {
            axios.delete(`/_admin/scriptures/${id}`)
                .then(() => {
                    this.deleteId = ''
                    this.fetchData()
                })
        },

        chagneStatus(id) {
            axios.patch(`/_admin/scriptures/${id}/status`).then((response) => {
                toast.fire({ icon: 'success', title: response.data.message })
                this.fetchData()
            }).catch(e => {
                this.errorMessage = e.response.data.message
            })
        }
    },

    created() {
        this.fetchData();
    },

    components: {
        HeaderComp,
        SidebarComp,
        FooterComp,
        BodyComp,
        BreadcrumbComp,
        DatatableComp,
        ModalComp,
        DeleteItemComp,
        ScriptureForm
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
                        <DatatableComp :columns=columns :tableData=res @editItem="editItem" @deleteItem="deleteItem"
                            @changeStatus="chagneStatus" />
                    </div>
                </div>
            </div>
        </section>

        <modal-comp modal-for="addItemModal" modal-title="Add Scripture">
            <ScriptureForm @reloadTable="fetchData" :edit-id="null" />
        </modal-comp>

        <modal-comp modal-for="editItemModal" modal-title="Edit Scripture">
            <ScriptureForm @reloadTable="fetchData" :edit-id="editId" />
        </modal-comp>

        <modal-comp modal-for="deleteModal" modal-title="Sure, you want to delete?">
            <DeleteItemComp :delete-id="deleteId" @deleteConfirm="deleteConfirm" />
        </modal-comp>

    </body-comp>

    <FooterComp />
</template>
