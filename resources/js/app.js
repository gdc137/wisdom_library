import './bootstrap';
import { createApp } from 'vue';
import HeaderComp from './components/general/HeaderComp.vue';
import FooterComp from './components/general/FooterComp.vue';
import CardComp from './components/general/CardComp.vue';
import CardlistComp from './components/general/CardlistComp.vue';

import Swal from 'sweetalert2'

window.Swal = Swal
const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true
})
window.toast = toast

import App from './components/App.vue'
import router from './router'

const app = createApp(App)
app.use(router)
app.component('header-comp', HeaderComp)
app.component('footer-comp', FooterComp)
app.component('card-comp', CardComp)
app.component('cardlist-comp', CardlistComp)
app.mount('#app')
