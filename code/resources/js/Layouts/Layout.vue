<script setup>
import { useForm } from '@inertiajs/vue3';
const form = useForm({});
const submit = () => {
    form.post('/logout');
}
</script>
<template>
    <Head>
        <meta head-key="description" name="description" value="Meta tag on default layout">
    </Head>
    <div>
        <header>
            
           <!-- TODO: REMOVE UNUSED <nav class="bg-blue-400 px-2 text-gray-800 min-h-10 text-md font-bold flex felx-row items-center shadow-md uppercase tracking-tight ">
                <ul class="flex w-full justify-around">
                      <ul class="flex w-full justify-around" v-if="$page.props.auth.user">
                    <li>
                        <Link :href="route('dashboard')">Dashboard</Link>
                    </li>
                    <li class="ml-1">
                        <Link :href="route('customers.index')">Customers</Link>
                    </li>
                    <li class="ml-1">
                        <Link :href="route('customers.create')">Add Customer</Link>
                    </li>
                    <li class="ml-1">
                        <form @submit.prevent="submit">
                            <PrimaryButton>Logout</PrimaryButton>
                        </form>
                    </li>
                </ul>
            </nav>
        -->
            <nav class="bg-sail-600 dark:bg-sail-800 text-black font-semibold py-4 px-4 rounded-b-lg uppercase ">
                <ul class="flex gap-2">
                    <li>
                        <Link class=" bg-sail-100 dark:bg-sail-600  leading-1 -tracking-tight rounded-lg py-2 px-4" :href="route('dashboard')">Dashboard</Link> 
                    </li>   
                    <li>
                        <Link class="rounded-lg py-2 px-4" :href="route('websites.index')">Websites</Link> 
                    </li>
                </ul>
            </nav>
        </header>
        <main class="p-4">
            <slot />
        </main>
    </div>
</template>
