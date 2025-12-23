<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router } from "@inertiajs/vue3";
import { computed, ref } from "vue";

// Props or data for characters
const props = defineProps({
    characters: Array,
});

// Methods
const deleteCharacter = (id) => {
    if (confirm("Are you sure you want to delete this character?")) {
        // Call Inertia to send DELETE request to your Laravel route
        router.delete(route("characters.destroy", id));
    }
};

const elementColors = {
    Anemo: "text-green-400",
    Geo: "text-yellow-600",
    Electro: "text-purple-600",
    Dendro: "text-green-600",
    Hydro: "text-blue-600",
    Pyro: "text-red-600",
    Cryo: "text-blue-400",
};

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
            <!-- Header -->
            <div class="text-center mb-6">
                <h1 class="text-4xl font-bold mb-2">Characters</h1>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end mb-6 space-x-4">
                <Link
                    :href="route('characters.create')"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition-all duration-300"
                >
                    Add New Character
                </Link>
                <Link
                    :href="route('home')"
                    class="px-4 py-2 bg-gray-400 text-white rounded shadow hover:bg-gray-500"
                >
                    Home
                </Link>
            </div>
            <input
                v-model="searchQuery"
                type="text"
                placeholder="Search characters..."
                class="w-full p-2 border rounded mb-4"
            />
            <div v-if="characters.length === 0" class="text-gray-500">
                No Characters found.
            </div>

            <ul v-if="filteredCharacters.length > 0" class="space-y-3">
                <li
                    v-for="character in filteredCharacters"
                    :key="character.id"
                    class="p-4 bg-white rounded shadow flex justify-between items-center"
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
                        <span :class="elementColors[character.element]">{{
                            character.element
                        }}</span>
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
                        <span
                            :class="
                                character.rarity === 5
                                    ? 'text-yellow-600'
                                    : 'text-purple-600'
                            "
                            >{{ character.rarity }}★</span
                        >
                    </div>
                    <div class="flex space-x-2">
                        <Link
                            :href="route('characters.edit', character.id)"
                            class="px-3 py-1 text-yellow-600 hover:bg-yellow-100 rounded-lg hover:scale-105 transition-transform"
                        >
                            Edit
                        </Link>
                        <button
                            @click="deleteCharacter(character.id)"
                            class="px-3 py-1 text-red-600 hover:bg-red-100 rounded-lg hover:scale-105 transition-transform"
                        >
                            Delete
                        </button>
                    </div>
                </li>
            </ul>
            <p v-else class="text-center text-gray-500">
                No characters match your search.
            </p>
        </div>
    </AppLayout>
</template>
