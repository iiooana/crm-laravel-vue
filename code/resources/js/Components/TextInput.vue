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
            default: false,
        },
        type: {
            type: String,
            default: 'text',
        },
        message: {
            type: String,
        },
        placeholder: {
            type: String,
            default: '',
        },
    });
</script>
<template>
    <label>{{ label }} <span v-if="isRequired" class="text-red-600 font-bold">*</span></label>
    <input :type="type" v-model="model" 
    :class="['focus:italic',{'!ring-red-500 border-red-500':message}]" 
    :aria-label="placeholder"
    :placeholder="placeholder"
    />
    <em v-if="message">{{ message }}</em>
</template>