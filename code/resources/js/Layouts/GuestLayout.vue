<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div
        class="flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0 dark:bg-gray-900"
    >
        <div><ApplicationLogo class="h-20 w-20 fill-current text-gray-500" /></div>

        <div
            class="mt-2 w-full overflow-hidden bg-white mx-auto p-4 drop-shadow-md sm:max-w-md sm:rounded-lg dark:bg-gray-800"
        >
            <slot></slot>   
        </div>
    </div>
</template>

