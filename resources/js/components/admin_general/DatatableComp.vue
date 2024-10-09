<script>
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net-bs5';

export default {
    components: {
        DataTable,
    },

    props: {
        columns: Array,
        tableData: '',
    },

    methods: {
        handleTableEvents() {
            const table = this.$refs.datatable.$el;

            table.addEventListener('click', (event) => {
                const target = event.target;
                const id = target.getAttribute('data-id');
                const action = target.getAttribute('data-action');

                if (action === 'edit') {
                    this.$emit('editItem', id);
                } else if (action === 'delete') {
                    this.$emit('deleteItem', id);
                } else if (action === 'changeStatus') {
                    this.$emit('changeStatus', id);
                }
            });
        },

    },

    mounted() {
        this.handleTableEvents(); // Attach event listeners to the table after it's mounted
    },

    created() {
        DataTable.use(DataTablesCore)
    },
}

</script>

<template>

    <div class="p-1 scroll">
        <DataTable :columns="columns" :data="tableData" class="datatables-basic table display" ref="datatable">
        </DataTable>
    </div>

</template>

<style>
.scroll {
    overflow-x: auto !important;
}
</style>
