<script>
export default {
    props: {
        modalFor: String,
        modalTitle: String,
    },
}
</script>

<template>
    <div class="modal fade text-start" v-bind:id="modalFor" tabindex="-1" aria-labelledby="myModalLabel22"
        aria-hidden="true" ref="modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ modalTitle }}</h4>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>

                </div>
                <div class="card">
                    <div class="card-body">
                        <slot></slot>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>