<script setup>
import axios from 'axios';

const logout = async () => {
    await axios.post("/_admin/logout").then(() => {
        window.location.href = '/_admin'
        oast.fire({ icon: 'success', title: 'Logout success' })
    })
}
</script>
<template>
    <h1>this is admin dashboard</h1>
    <button @click="logout()">logout</button>
</template>