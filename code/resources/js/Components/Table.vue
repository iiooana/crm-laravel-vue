<script setup>
defineProps({
    headers: {
        type: Array,
        required: true
    },
    rows: {
        type: Array,
        required: true
    },
    pagination: {
        type: Array,
        required: false
    }
})
</script>

<template>
    <table class="min-w-full border border-gray-300 text-sm text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 border-b font-semibold" v-for="(header,index) in headers" :key="index"> {{ header }}</th>
            </tr>
        </thead>
        <tbody>
            <tr class="hover:bg-gray-200" v-for="(row, index) in rows" :key="index">
                <td class="py-2 px-4 border-b" v-for="(value, colIndex) in row" :key="colIndex">
                    {{ value }}
                </td>
            </tr>
        </tbody>
        <tfoot class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 border-b font-semibold" v-for="(header,index) in headers" :key="index">{{ header }}</th>
            </tr>
        </tfoot>
    </table>
    <div class="grid grid-cols-2" v-if="pagination">
        <div>
            
        </div>
        <div>

        </div>
    </div>
</template>