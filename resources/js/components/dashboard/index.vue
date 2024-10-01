<script setup>
import { ref, onMounted } from 'vue'
import { useRouter } from "vue-router";

const router = useRouter()

let books = ref([])

onMounted(async () => {
    getBooks()
})

const ourImage = (img) => {
    return '/uploads/' + img
}

const newBook = () => {
    router.push('/books/add')
}

const onEdit = (id) => {
    router.push(`/books/${id}/edit`)
}

const getBooks = async () => {
    let response = await axios.get('api/books')
        .then((res) => {
            books.value = res.data.books
        })
}

const deleteItem = (id) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/api/books/${id}`)
                .then(() => {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                    getBooks()
                })
        }
    });
}
</script>

<template>
    <section>
        <div class="products__list table  my-3">

            <div class="customers__titlebar dflex justify-content-between align-items-center">
                <div class="customers__titlebar--item">
                    <h1 class="my-1">Products</h1>
                </div>
                <div class="customers__titlebar--item">
                    <!-- <router-link  class="btn btn-secondary my-1" to="/books/add">Add book</router-link> -->
                    <button @click="newBook">
                        Add Product
                    </button>
                </div>
            </div>

            <div class="table--heading mt-2 products__list__heading " style="padding-top: 20px;background:#FFF">
                <!-- <p class="table--heading--col1">&#32;</p> -->
                <p class="table--heading--col1">image</p>
                <p class="table--heading--col2">
                    Product
                </p>
                <p class="table--heading--col4">Type</p>
                <p class="table--heading--col3">
                    Inventory
                </p>
                <!-- <p class="table--heading--col5">&#32;</p> -->
                <p class="table--heading--col5">actions</p>
            </div>

            <!-- product 1 -->
            <div class="table--items products__list__item" v-for="book in books" :key="book.id">
                <div class="products__list__item--imgWrapper">
                    <img class="products__list__item--img" :src="ourImage(book.image)" style="height: 40px;">
                </div>
                <a href="# " class="table--items--col2">
                    {{ book.title }}
                </a>
                <p class="table--items--col2">
                    {{ book.description }}
                </p>
                <p class="table--items--col3">
                    10
                </p>
                <div>
                    <button class="btn-icon btn-icon-success" @click="onEdit(book.id)">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="btn-icon btn-icon-danger" @click="deleteItem(book.id)">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </div>
            </div>

        </div>
    </section>
</template>