<script setup>
import { Link, Head } from '@inertiajs/vue3';
</script>
<template>
    <Head>
        <meta head-key="description" name="description" value="Meta tag on default layout">
    </Head>
    <div>
        <header>
            <nav class="bg-blue-400 px-2 text-gray-800 min-h-10 text-md font-bold flex felx-row items-center shadow-md uppercase tracking-tight ">
                <ul class="flex w-[100%] justify-around">
                    <li>
                        <Link :href="route('dashboard')">Dashboard</Link>
                    </li>
                    <li class="ml-1">
                        <Link :href="route('about')">About</Link>
                    </li>
                </ul>
            </nav>
        </header>
        <main class="p-4">
            <slot />
        </main>
    </div>
</template>
