<script setup>
    import { useForm } from '@inertiajs/vue3';
    import TextInput from '@/Components/TextInput.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';

    const form = useForm({
        domain: null,
    });
    const submit = () => {
        form.post('/websites')
    }
</script>
<template>

    <Head>
        <title>Create website </title>
    </Head>
    <h1>Create website</h1>
    <form @submit.prevent="submit">
        <div class="grid grid-cols-1">
            <TextInput label="Domain" type="text" :isRequired="true" placeholder="www.example.com" v-model="form.domain"
                :message="form.errors.domain" />
        </div>
        <div class="my-4 flex justify-center">
            <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
            </div>
    </form>
</template>