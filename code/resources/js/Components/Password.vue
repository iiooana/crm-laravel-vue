<script setup>
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
    import { faEye } from '@fortawesome/free-regular-svg-icons';
    import { faEyeSlash } from '@fortawesome/free-solid-svg-icons';
    import { ref } from 'vue';
    const model = defineModel({
        type: null,
        required: true,
    })
    defineProps({
        label: {
            type: String,
            required: true,
        },
        message: {
            type: String,
        },
    });
    const type = ref('password');
    const icon = ref(faEyeSlash);
    const viewPwd = () => {
        console.log(type);
        if (icon.value.iconName == 'eye-slash') {
            icon.value = faEye;
            type.value = 'text';
        } else {
            icon.value = faEyeSlash;
            type.value = 'password';
        }
    }
</script>
<template>
    <label>{{ label }} <span class="text-red-600 font-bold">*</span></label>
    <div class="relative">
        <input :type="type" v-model="model" required="true" :class="['focus:italic',{ '!ring-red-500 border-red-500': message }]"
            aria-label="Password" />

        <button type="button" class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-900"
            @click="viewPwd">
            <FontAwesomeIcon class="w-5 h-5" :icon="icon" />
        </button>
    </div>
    <em v-if="message">{{ message }}</em>
</template>