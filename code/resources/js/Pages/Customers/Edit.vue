<script setup>
import  { reactive } from 'vue';
import { router } from '@inertiajs/vue3';
const form = reactive({
    first_name: null,
    last_name: null,
});
const submit = () => {
   router.post('/customers',form);
}
</script>
<template lang="">
    <Head>
        <title>Add customer</title>
    </Head>
    <div>
        <h1>Add customer </h1>
            <form @submit.prevent="submit">
                <div class="grid grid-cols-2 xs:grid-cols-1 gap-2 mx-auto">
                <div>
                <label>First Name *</label>
                <input type="text" v-model="form.first_name" />
                </div>
                <div>
                <label>Last Name *</label>
                <input type="text" v-model="form.last_name" />
                </div>
            </div>
<div></div>
<div class="my-2 flex justify-center">
    <button class="btn-primary">Save</button>
</div>
        </form>
    </div>
</template>
