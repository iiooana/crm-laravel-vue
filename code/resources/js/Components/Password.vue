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
        isRequired: {
            type: Boolean,
            default: true,
        },
        message: {
            type: String,
        },
    });
</script>
<template>
    <label>{{ label }} <span v-if="isRequired" class="text-red-600 font-bold">*</span></label>
    <input type="password" v-model="model" 
    :class="{'!ring-red-500 border-red-500':message}" 
    />
    <em v-if="message">{{ message }}</em>
</template>