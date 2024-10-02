<script>
import axios from 'axios';
import { useRouter } from 'vue-router'
import HeaderComp from '../general/HeaderComp.vue'
import FooterComp from '../general/FooterComp.vue';
import CardlistComp from '../general/CardlistComp.vue';

export default {

    data() {
        return {
            router: useRouter(),
        }
    },

    components: {
        HeaderComp,
        FooterComp,
        CardlistComp
    },

    methods: {
        logout() {
            axios.post('/_admin/logout').then(() => {
                this.router.push('/_admin')
                toast.fire({ icon: 'success', title: 'Logout success' })
            })
        }
    }
}
</script>
<template>
    <HeaderComp />
    <!-- <div class="container">
        <div class="search">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <div class="search-2"> <i class='bx bxs-map'></i> <input type="text"
                                placeholder="San Francisco,USA"> <button>Search</button> </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <button @click="logout()">logout</button>
    <section class="my-5">
        <CardlistComp />
    </section>
    <FooterComp />
</template>


<style>
.search {
    background-color: #fff;
    padding: 4px;
    border-radius: 5px
}

.search-1 {
    position: relative;
    width: 100%
}

.search-1 input {
    height: 45px;
    border: none;
    width: 100%;
    padding-left: 34px;
    padding-right: 10px;
    border-right: 2px solid #eee
}

.search-1 input:focus {
    border-color: none;
    box-shadow: none;
    outline: none
}

.search-1 i {
    position: absolute;
    top: 12px;
    left: 5px;
    font-size: 24px;
    color: #eee
}

::placeholder {
    color: #eee;
    opacity: 1
}

.search-2 {
    position: relative;
    width: 100%
}

.search-2 input {
    height: 45px;
    border: none;
    width: 100%;
    padding-left: 18px;
    padding-right: 100px
}

.search-2 input:focus {
    border-color: none;
    box-shadow: none;
    outline: none
}

.search-2 i {
    position: absolute;
    top: 12px;
    left: -10px;
    font-size: 24px;
    color: #eee
}

.search-2 button {
    position: absolute;
    right: 1px;
    top: 0px;
    border: none;
    height: 45px;
    background-color: red;
    color: #fff;
    width: 90px;
    border-radius: 4px
}

@media (max-width:800px) {
    .search-1 input {
        border-right: none;
        border-bottom: 1px solid #eee
    }

    .search-2 i {
        left: 4px
    }

    .search-2 input {
        padding-left: 34px
    }

    .search-2 button {
        height: 37px;
        top: 5px
    }
}
</style>