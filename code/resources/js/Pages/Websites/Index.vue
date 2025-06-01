<script setup>
import { Head,Link } from '@inertiajs/vue3';
import Table from '@/Components/Table.vue';

const props = defineProps({
    websites:Object
});
const headers = ['#','Domain','Created At', 'Updated At','Actions']

const rows =  props.websites.data.map( (website,index) => [
    website.id,
    website.domain,
    website.created_at,
    website.updated_at,
    "<Link></Link>"
])

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
    <div class="overflow-x-auto">
        <Table :headers="headers" :rows="rows" />
    </div>
</template>