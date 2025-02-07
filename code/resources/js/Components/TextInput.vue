<script setup>
    const model = defineModel({
        type: null,
        required: true,
    })
    defineProps({
        label: {
            type: String,
            required: true,
        },
        type: {
            type: String,
            default: 'text',
        },
        message: {
            type: String,
        }
    });
</script>
<template>
    <label>{{ label }}</label>
    <input :type="type" v-model="model" 
    :class="{'!ring-red-500 border-red-500':message}" />
    <em v-if="message">{{ message }}</em>
</template>