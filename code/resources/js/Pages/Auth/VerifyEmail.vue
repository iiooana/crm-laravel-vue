<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Alert from '@/Components/Alert.vue';
</script>
<script>
export default {
    layout: GuestLayout
}
</script>
<template>
    <Head>
        <title>Email verification</title>
    </Head>
    <h1>Email verification</h1>
    <Alert status="success" :message="$page.props.flash?.success"></Alert>
</template>