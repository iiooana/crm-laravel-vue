
<script setup>
   import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
   import { faCircleCheck,faCircleXmark } from '@fortawesome/free-regular-svg-icons';
   import { faCircleExclamation } from '@fortawesome/free-solid-svg-icons';
   import { faCircleInfo } from '@fortawesome/free-solid-svg-icons';

   import { ref } from 'vue';
   const {message,status} = defineProps({
        message: {
            type: String,
            required: true  
        },
        status: {
            type: String,
            default: 'success'
        }
   });  
   
    let background = ref('bg-green-300/75')
    let text = ref('text-green-600')
    let icon = faCircleCheck
   switch(status){
        case 'danger':
            background = 'bg-red-300/75'
            text = 'text-red-600'
            icon = faCircleXmark
            break; 
        case 'warning':
            background = 'bg-amber-300/75'
            text = 'text-amber-600'
            icon = faCircleExclamation
            break;
        case 'info':
            background = 'bg-blue-300/75'
            text = 'text-blue-600'
            icon = faCircleInfo
            break;   
   } 
   </script>
<template>
     <div :class="['flex py-2 px-3 rounded-lg mt-2 gap-2',background]">
        <div>
            <FontAwesomeIcon :icon="icon" :class="[text]"></FontAwesomeIcon>
        </div>
        <div>   
            <p>{{ message }}</p>
        </div>
    </div>
</template>