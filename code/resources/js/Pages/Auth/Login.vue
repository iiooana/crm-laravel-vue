<script setup>
    import { useForm } from '@inertiajs/vue3';
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import TextInput from '@/Components/TextInput.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import Password from '@/Components/Password.vue';

    const form = useForm({
        email: null,
        password: null
    });
    const submit = () => {
        form.post('/login');
    }

</script>
<script>
    export default {
        layout: GuestLayout,
    }
</script>
<template>
    <Head><title>Login</title></Head>
    <h1>Login</h1>
    <form @submit.prevent="submit">
        <div class="grid grid-cols-1 gap-3">
            <TextInput label="Email" type="email" isRequired="true" placeholder="doe@example.com" v-model="form.email" :message="form.errors.email"  />
            <Password  label="Password" aria-placeholder="Password"  v-model="form.password" :message="form.errors.password" />
            <div class="flex justify-center">
                <PrimaryButton>Login</PrimaryButton>                
            </div>
        </div>
    </form>
</template>