<script setup>
import { AgGridVue } from 'ag-grid-vue3';
import 'ag-grid-community/styles/ag-grid.css'
import 'ag-grid-community/styles/ag-theme-alpine.css'
const props = defineProps({
    columns: {
        type: Array,
        required: true,
    },
    rows : {
        type: Array,
        required: true,
    }
})
</script>
<template>
    <div class="ag-theme-alpine w-full min-h-[400px]" >
        <AgGridVue class="ag-theme-alpine w-full h-full" :columnDefs="columns" :rowData="rows" :pagination="true"  domlayout="autoHeight"
        :paginationPageSize="10"
        :paginationPageSizeSelector="[10, 20, 50, 100]" />
    </div>
</template>