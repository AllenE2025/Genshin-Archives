<script setup lang="ts">
import { router, Link } from '@inertiajs/vue3';
import { reactive } from 'vue';

interface Character {
  id: number;
  name: string;
 
}

const props = defineProps<{ character: Character }>();

// Use reactive to bind to form
const form = reactive({ ...props.character });

const errors = reactive({
  name: '',
 
});

function submit() {
  router.put(route('characters.update', form.id), form, {
    onError: (err) => Object.assign(errors, err),
  });
}
</script>


<template>
     <Link
        :href="route('characters.index')"
        class="mt-4 inline-block px-4 py-2 bg-gray-600 text-white rounded shadow hover:bg-gray-700"
    >
        Go Back
    </Link>
  <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Edit Character</h1>

    <div class="mb-4">
      <label class="block font-medium mb-1">Name</label>
      <input v-model="form.name" type="text" class="w-full border rounded px-3 py-2"/>
      <p v-if="errors.name" class="text-red-600 text-sm mt-1">{{ errors.name }}</p>
    </div>

    <!-- Add other fields -->

    <button @click="submit" class="px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700">
      Update
    </button>
  </div>
</template>
