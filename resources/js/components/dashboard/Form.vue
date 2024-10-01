<script setup>
import { reactive, ref, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'

const form = reactive({
    title: "",
    desc: "",
    image: "",
    auther: ""
})

let errors = ref([])
let editMode = ref(false)

const router = useRouter()
const route = useRoute()

onMounted(() => {
    if (route.name === 'books.edit') {
        editMode.value = true
        getBooks()
    }
})

const getBooks = async () => {
    let response = axios.get(`/api/books/${route.params.id}/edit`)
        .then((res) => {
            form.title = res.data.books.title
            form.desc = res.data.books.description
        })
}

const getImage = () => {
    let image = "/uploads/no-image.jpeg"
    if (form.image) {
        if (form.image.indexOf("base64") != -1) {
            image = form.image
        } else {
            image = "/upload/" + form.image
        }
    }
    return image
}

const handleImage = (e) => {
    let file = e.target.files[0]
    let reader = new FileReader()
    reader.onloadend = (file) => {
        form.image = reader.result
    }
    reader.readAsDataURL(file)
}

const submitForm = (values, actions) => {
    if (editMode.value) {
        editForm(values, actions)
    } else {
        addForm(values, actions)
    }
}

const addForm = (values, actions) => {
    axios.post('/api/books', form)
        .then((res) => {
            router.push('/')
            toast.fire({ icon: 'success', title: 'book added successfully' })
        })
        .catch((error) => {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors
            }
        })
}

const editForm = (values, actions) => {
    axios.put(`/api/books/${route.params.id}`, form)
        .then((res) => {
            router.push('/')
            toast.fire({ icon: 'success', title: 'book updated successfully' })
        })
        .catch((error) => {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors
            }
        })
}

</script>

<template>
    <div class="products__create ">

        <div class="products__create__titlebar dflex justify-content-between align-items-center">
            <div class="products__create__titlebar--item">

                <h1 class="my-1"><span v-if="editMode">Edit</span><span v-else>Add</span> Product</h1>
            </div>
            <div class="products__create__titlebar--item">

                <button class="btn btn-secondary ml-1" @click="submitForm">
                    Save
                </button>
            </div>
        </div>

        <div class="products__create__cardWrapper mt-2">
            <div class="products__create__main">
                <div class="products__create__main--addInfo card py-2 px-2 bg-white">
                    <p class="mb-1">Title</p>
                    <input type="text" class="input" v-model="form.title">
                    <small style="color: red;" v-if="errors.title">{{ errors.title }}</small>
                    <p class="my-1">Description (optional)</p>
                    <textarea cols="10" rows="5" class="textarea" v-model="form.desc"></textarea>
                    <small style="color: red;" v-if="errors.desc">{{ errors.desc }}</small>

                    <div class="products__create__main--media--images mt-2">
                        <ul class="products__create__main--media--images--list list-unstyled">
                            <li class="products__create__main--media--images--item">
                                <div class="products__create__main--media--images--item--imgWrapper">
                                    <img class="products__create__main--media--images--item--img" :src="getImage()"
                                        alt="" />
                                </div>
                            </li>
                            <!-- upload image small -->
                            <li class="products__create__main--media--images--item">
                                <form class="products__create__main--media--images--item--form">
                                    <label class="products__create__main--media--images--item--form--label"
                                        for="myfile">Add Image</label>
                                    <input class="products__create__main--media--images--item--form--input" type="file"
                                        id="myfile" @change="handleImage">
                                </form>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>

        <!-- Footer Bar -->
        <div class="dflex justify-content-between align-items-center my-3">
            <p></p>
            <button class="btn btn-secondary" @click="submitForm">Save</button>
        </div>

    </div>
</template>