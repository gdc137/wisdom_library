<script>
import axios from 'axios';
import { reactive } from 'vue';

export default {

    data() {
        return {
            form: reactive({
                title: 'test data',
                description: 'test data',
                image: '',
                author: 'test data',
                publish_detail: 'test data',
                root_language: 'test data',
                visible_at: '2024-10-06',
                meta_slug: 'test data',
                meta_title: 'test data',
                meta_desc: 'test data',
                meta_keywords: 'test data',
            }),
            imageVisibility: 'd-none',
            imagePreview: '/storage/uploads/no-image.jpeg',
            errorMessage: []
        }
    },

    props: {
        editId: null
    },

    watch: {
        editId(newid, oldid) {
            if (newid != null) {
                axios.get(`/_admin/scriptures/${this.editId}/edit`)
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
            axios.post('/_admin/scriptures', this.form, {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            })
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
            axios.put(`/_admin/scriptures/${id}`, this.form)
                .then((response) => {
                    this.name = ''
                    this.$refs.Close.click()
                    toast.fire({ icon: 'success', title: response.data.message })
                    this.$emit('reload-table');
                }).catch((error) => {
                    this.errorMessage = error.response.data.errors
                })
        },

        handleImage(e) {
            let file = e.target.files[0]
            this.form.image = file

            let reader = new FileReader()
            reader.onloadend = (event) => {
                this.imageVisibility = ''
                this.imagePreview = event.target.result
            }
            reader.readAsDataURL(file)
        },
    }
}
</script>

<template>
    <form enctype="multipart/form-data" id="validationform" @submit.prevent="submitFrom">

        <div class="row">
            <div class="col-md-12 col-12">
                <div class="mb-1">
                    <label class="form-label" for="title">Title</label>
                    <input type="text" class="form-control" v-model="form.title" id="title" placeholder="Enter Title">
                    <p class="text-danger" v-if="errorMessage.title">{{ errorMessage.title[0] }}</p>
                </div>
            </div>

            <div class="col-md-12 col-12">
                <div class="mb-1">
                    <label class="form-label" for="description">Description</label>
                    <textarea class="form-control" id="description" v-model="form.description"
                        placeholder="Enter Description"></textarea>
                    <p class="text-danger" v-if="errorMessage.description">{{ errorMessage.description[0] }}</p>
                </div>
            </div>

            <div class="col-md-8 col-12">
                <div class="mb-1">
                    <label class="form-label" for="image">Image <small>(500x500 px)</small></label>
                    <input type="file" id="image" class="form-control" accept="image/*" @change="handleImage" />
                    <p class="text-danger" v-if="errorMessage.image">{{ errorMessage.image[0] }}</p>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="mb-1" :class="imageVisibility">
                    <img :src="imagePreview" class="w-100" alt="preview">
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="mb-1">
                    <label class="form-label" for="author">Author</label>
                    <input type="text" class="form-control" v-model="form.author" id="author"
                        placeholder="Enter Author">
                    <p class="text-danger" v-if="errorMessage.author">{{ errorMessage.author[0] }}</p>
                </div>
            </div>

            <div class="col-md-8 col-12">
                <div class="mb-1">
                    <label class="form-label" for="publish_detail">Publish Detail</label>
                    <textarea class="form-control" id="publish_detail" v-model="form.publish_detail"
                        placeholder="Enter Publish Detail"></textarea>
                    <p class="text-danger" v-if="errorMessage.publish_detail">{{ errorMessage.publish_detail[0] }}</p>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="mb-1">
                    <label class="form-label" for="root_language">Root Language</label>
                    <input type="text" class="form-control" v-model="form.root_language" id="root_language"
                        placeholder="Enter Root Language">
                    <p class="text-danger" v-if="errorMessage.root_language">{{ errorMessage.root_language[0] }}</p>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="mb-1">
                    <label class="form-label" for="visible_at">Visible At</label>
                    <input type="date" class="form-control" v-model="form.visible_at" id="visible_at"
                        placeholder="Enter Visible At">
                    <p class="text-danger" v-if="errorMessage.visible_at">{{ errorMessage.visible_at[0] }}</p>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="mb-1">
                    <label class="form-label" for="meta_slug">Meta Slug</label>
                    <input type="text" class="form-control" v-model="form.meta_slug" id="meta_slug"
                        placeholder="Enter Meta Slug">
                    <p class="text-danger" v-if="errorMessage.meta_slug">{{ errorMessage.meta_slug[0] }}</p>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="mb-1">
                    <label class="form-label" for="meta_title">Meta Title</label>
                    <input type="text" class="form-control" v-model="form.meta_title" id="meta_title"
                        placeholder="Enter Meta Title">
                    <p class="text-danger" v-if="errorMessage.meta_title">{{ errorMessage.meta_title[0] }}</p>
                </div>
            </div>

            <div class="col-md-12 col-12">
                <div class="mb-1">
                    <label class="form-label" for="meta_desc">Meta Description</label>
                    <textarea class="form-control" id="meta_desc" v-model="form.meta_desc"
                        placeholder="Enter Meta Description"></textarea>
                    <p class="text-danger" v-if="errorMessage.meta_desc">{{ errorMessage.meta_desc[0] }}</p>
                </div>
            </div>

            <div class="col-md-12 col-12">
                <div class="mb-1">
                    <label class="form-label" for="meta_keywords">Meta Keywords</label>
                    <input type="text" class="form-control" v-model="form.meta_keywords" id="meta_keywords"
                        placeholder="Enter Meta Keywords">
                    <p class="text-danger" v-if="errorMessage.meta_keywords">{{ errorMessage.meta_keywords[0] }}</p>
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