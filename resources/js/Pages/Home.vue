<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    characters: Array,
});
</script>

<template>
    <AppLayout>
        <div class="max-w-3xl mx-auto mt-10 p-4">
            <h1 class="text-4xl font-bold mb-4 text-center">
                Genshin Archives
            </h1>
            <p class="text-center text-gray-600 mb-6">
                Welcome to the Genshin Archives page!
            </p>

            <div
                v-if="characters.length === 0"
                class="text-center text-gray-500"
            >
                Add some characters to see them listed here.
            </div>

            <ul v-else class="space-y-4">
                <p>Characters</p>
                <li
                    v-for="character in characters"
                    :key="character.id"
                    class="p-4 bg-white rounded-lg shadow hover:shadow-lg transition-shadow"
                >
                    <span class="text-lg font-medium">{{
                        character.name
                    }}</span>
                </li>
            </ul>
        </div>
    </AppLayout>
</template>
