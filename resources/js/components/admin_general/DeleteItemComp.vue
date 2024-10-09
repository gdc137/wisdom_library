<script>
export default {
    props: ['deleteId'],

    methods: {
        deleteItem() {
            this.$emit('delete-confirm', this.deleteId);
            this.$refs.Close.click();
        }
    }
};
</script>

<template>
    <div class="row text-center">
        <div class="col-6">
            <button type="button" @click="deleteItem" class="btn btn-success me-1">Yes</button>
        </div>
        <div class="col-6">
            <button type="button" class="btn btn-danger me-1" data-bs-dismiss="modal" aria-label="Close" ref="Close">No</button>
        </div>
    </div>
</template>