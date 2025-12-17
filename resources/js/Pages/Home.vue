<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { computed, ref } from "vue";

const props = defineProps({
    characters: Array,
});

const searchQuery = ref("");

const filteredCharacters = computed(() => {
    if (!searchQuery.value) {
        return props.characters;
    }
    return props.characters.filter((character) =>
        character.name.toLowerCase().includes(searchQuery.value.toLowerCase())
    );
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
            <input
                v-model="searchQuery"
                type="text"
                placeholder="Search characters..."
                class="w-full p-2 border rounded mb-4"
            />
            <div
                v-if="characters.length === 0"
                class="text-center text-gray-500"
            >
                Add some characters to see them listed here.
            </div>

            <ul v-if="filteredCharacters.length > 0" class="space-y-3">
                <p>Characters</p>
                <li
                    v-for="character in filteredCharacters"
                    :key="character.id"
                    class="p-4 bg-white rounded-lg shadow hover:shadow-lg transition-shadow flex justify-evenly items-center"
                >
                    <div>
                        <span class="block text-gray-500 text-sm font-medium"
                            >Name</span
                        >
                        <span class="block text-lg font-semibold">{{
                            character.name
                        }}</span>
                    </div>

                    <div>
                        <span class="block text-gray-500 text-sm font-medium"
                            >Element</span
                        >
                        <span class="block">{{ character.element }}</span>
                    </div>

                    <div>
                        <span class="block text-gray-500 text-sm font-medium"
                            >Weapon</span
                        >
                        <span class="block">{{ character.weapon_type }}</span>
                    </div>

                    <div>
                        <span class="block text-gray-500 text-sm font-medium"
                            >Rarity</span
                        >
                        <span class="block">{{ character.rarity }}★</span>
                    </div>
                </li>
            </ul>
            <p v-else class="text-center text-gray-500">
                No characters match your search.
            </p>
        </div>
    </AppLayout>
</template>
