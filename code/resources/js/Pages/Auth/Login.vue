<script setup>
    import { useForm } from '@inertiajs/vue3';
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import TextInput from '@/Components/TextInput.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import Password from '@/Components/Password.vue';
    import Alert from '@/Components/Alert.vue';
    import { ref } from 'vue';   
 

    const form = useForm({
        email: null,
        password: null,
    });

    //ref use to primite variable
    //reactive for object
    // remember ".value"
    let forgot_div = ref(false)

    const submit = () => {
        if(!forgot_div.value){
            form.post('/login');
        }else{
            form.post('/forgot-password',{
                onSuccess: () =>   form.reset()
            })
        }
    }
</script>
<script>
    export default {
        layout: GuestLayout,
    }
</script>
<template>

    <Head>
        <title v-if="!forgot_div">Login</title>
        <title v-else>Forgot password</title>
    </Head>
    <h1 v-if="!forgot_div">Login</h1>
    <h1 v-else>Forgot password</h1>
    <form @submit.prevent="submit">
        <div class="grid grid-cols-1 gap-3">
            <TextInput label="Email" type="email" :isRequired="true" placeholder="doe@example.com" v-model="form.email"
                :message="form.errors.email" />
            <Password v-if="!forgot_div" label="Password" v-model="form.password" :message="form.errors.password" />
            <p v-if="!forgot_div">Forgot password? <a @click="forgot_div = !forgot_div">Click here</a> </p>
            <p v-else><a @click="forgot_div = !forgot_div">Go to login.</a> </p>
            <div class="flex justify-center">
                <PrimaryButton :disabled="form.processing">
                    <span v-if="!forgot_div">Login</span>
                    <span v-else>Reset password</span>
                </PrimaryButton>
            </div>
        </div>
    </form>
    <Alert v-if="$page.props.flash?.success" :message="$page.props.flash?.success" status="success"></Alert>
</template>