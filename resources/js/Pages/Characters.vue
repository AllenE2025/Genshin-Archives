<script setup>
import { Link, router } from "@inertiajs/vue3";
import { defineProps } from 'vue';

const props = defineProps({
    characters: Array
});

function deleteCharacter(id) {
   if (!confirm('Are you sure you want to delete this character?'))return;

    router.delete(route('characters.destroy', id));
}
</script>

<template>
  <div class="max-w-3xl mx-auto mt-10 p-4">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Characters</h1>
      <Link
        :href="route('characters.create')"
        class="px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700"
      >
        Create New Character
      </Link>
      <Link :href="route('home')">
        Home
    </Link>
    </div>

    <div v-if="characters.length === 0" class="text-gray-500">
      No characters found.
    </div>

    <ul v-else class="space-y-3">
      <li
        v-for="character in characters"
        :key="character.id"
        class="p-4 bg-white rounded shadow flex justify-between items-center"
      >
        <span>{{ character.name }}</span>
        <Link
          :href="route('characters.edit', character.id)"
          class="px-3 py-1 bg-yellow-500 text-white rounded shadow hover:bg-yellow-600">Edit</Link>
         <button
        @click="deleteCharacter(character.id)"
        class="px-3 py-1 bg-red-600 text-white rounded shadow hover:bg-red-700"
      >
        Delete
      </button>
      </li>
    </ul>
  </div>
        
</template>
