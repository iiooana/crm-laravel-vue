<script setup>
    import { useForm } from '@inertiajs/vue3';
    import TextInput from '@/Components/TextInput.vue';
    const form = useForm({
        first_name: null,
        last_name: null,
        gender:null,
    });
    const submit = () => {
        form.post('/customers');
    }
</script>
<template>
    <!--<Head><title>Add Customer</title></Head> -->
  <div> 
        <h1>Add customer</h1>
        <form @submit.prevent="submit">
            <div class="grid grid-cols-2 xs:grid-cols-1 gap-2 mx-auto">
                <div>
                   <TextInput label="First Name * "  v-model="form.first_name" :message="form.errors.first_name"  />
                </div>
                <div>
                    <TextInput label="Last Name *"  v-model="form.last_name" :message="form.errors.last_name"  />
                </div>
                <div>
                    <label>Gender *</label>
                   <select v-model="form.gender">
                    <option value="" disabled>Select one</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                    <option value="Not-binary">Not binary</option>
                    <option value="Prefer not to Answer">Prefer not to Answer</option>
                    <option value="Other">Other</option>
                   </select>
                    <em>{{ form.errors.gender }}</em>
                </div>
            </div>
            <div class="my-2 flex justify-center">
                <button class="btn-primary" :disabled="form.processing">Save</button>
            </div>
        </form>
  </div>
</template>