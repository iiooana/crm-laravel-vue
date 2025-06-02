<script setup>
import { Head,Link } from '@inertiajs/vue3';
import AgGridTable from '@/Components/AgGridTable.vue';


const props = defineProps({
    websites:Object
});
const columns = [
    { headerName: "#", field: "id", width: 60 },
    { headerName: "Domain", field: "domain", sortable: true, filter: true },
    { headerName: "Created at", field: "created_at", sortable:true, filter:true},
    {headerName : "Updated At", field: "updated_at", sortable: true}
]
const rows =  props.websites.data.map( (website) => ({
    id: website.id,
    domain: website.domain,
    created_at: website.created_at,
    updated_at: website.updated_at
}) )

console.log("cols ",columns);
console.log("rows ",rows);

</script>
<template>
    <Head>
        <title>Websites </title>
    </Head>
    <h1>Websites</h1>

    <div class="max-w-[40px]">
        <Link
            class="inline-flex items-center rounded-md border border-transparent bg-blue-800 hover:bg-blue-900 px-4 py-2 text-sm font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out focus:outline-none focus:ring-1 focus:ring-violet-500 focus:ring-offset-2 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white dark:focus:bg-white dark:focus:ring-offset-gray-800 dark:active:bg-gray-300"
            :href="route('websites.create')"
        >
            New website
        </Link>
    </div>

    <div class="">
        <AgGridTable :columns="columns" :rows="rows" />
    </div>
   
</template>