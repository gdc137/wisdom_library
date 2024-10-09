<script>
import axios from 'axios';
import { reactive } from 'vue';

export default {

    data() {
        return {
            form: reactive({
                name: '',
            }),
            storedEditId: '',
            errorMessage: []
        }
    },

    props: {
        editId: null
    },

    watch: {
        editId(newid, oldid) {
            if (newid != null) {
                axios.get(`/_admin/languages/${this.editId}/edit`)
                    .then((response) => {
                        this.form.name = response.data.data.name
                    })
            } else {
                this.form.name = ''
            }
        }
    },

    methods: {
        submitFrom() {
            if (this.editId != null) {
                this.editForm(this.editId)
            } else {
                this.addForm()
            }
        },

        addForm() {
            axios.post('/_admin/languages', this.form)
                .then((response) => {
                    this.name = ''
                    this.$refs.Close.click()
                    toast.fire({ icon: 'success', title: response.data.message })
                    this.$emit('reload-table');
                }).catch((error) => {
                    this.errorMessage = error.response.data.errors
                })
        },

        editForm(id) {
            axios.put(`/_admin/languages/${id}`, this.form)
                .then((response) => {
                    this.name = ''
                    this.$refs.Close.click()
                    toast.fire({ icon: 'success', title: response.data.message })
                    this.$emit('reload-table');
                }).catch((error) => {
                    this.errorMessage = error.response.data.errors
                })
        }
    }
}
</script>

<template>
    <form enctype="multipart/form-data" id="validationform" @submit.prevent="submitFrom">

        <div class="row">
            <div class="col-md-12 col-12">
                <div class="mb-1">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" class="form-control" v-model="form.name" id="name" placeholder="Enter Name">
                    <p class="text-danger" v-if="errorMessage.name">{{ errorMessage.name[0] }}</p>
                </div>
            </div>
        </div>

        <div class="col-12">
            <button type="button" class="btn btn-flat-secondary waves-effect" aria-label="Close" data-bs-dismiss="modal"
                ref="Close">Close</button>
            <button type="submit" class="btn btn-primary float-end">Add</button>
        </div>
    </form>
</template>