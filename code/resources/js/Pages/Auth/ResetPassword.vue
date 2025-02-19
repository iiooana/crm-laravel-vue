<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import TextInput from '@/Components/TextInput.vue';
import Password from '@/Components/Password.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';
import Alert from '@/Components/Alert.vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();

const form = useForm({
    token: page.props.token,    
    email: (page.props.email || null),
    password: null,
    password_confirmation: null
})
const submit = () => {
    form.post('/reset-password',{
        onSuccess: () => form.reset('password','password_confirmation')
    })
}

</script>

<script>
export default {
    layout: GuestLayout
}
</script>
<template>
    <Head>
        <title>Reset password</title>
    </Head>
    <h1>Reset password</h1>
 
    <form @submit.prevent="submit">
        <div class="grid gird-cols-1 gap-3">
            <TextInput aria-label="Email" label="Email" type="email" :isRequired="true" placeholder="doe@example.com" v-model="form.email" :message="form.errors.email"></TextInput>
            <Password label="Password" v-model="form.password" :message="form.errors.password"></Password>
            <small>{{ $page.props.password_requirements }}</small>
            <Password label="Confirm Password" v-model="form.password_confirmation" :message="form.errors.password_confirmation"></Password>
            <p>Go on login page</p>
            <div class="flex justify-center">
                <PrimaryButton :disabled="form.processing">Save new password</PrimaryButton>
            </div>
        </div>
        <Alert v-if="$page.props.flash?.success" :message="$page.props.flash?.success" status="success"></Alert>

    </form>
    
</template>