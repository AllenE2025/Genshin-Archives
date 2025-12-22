<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { computed, ref } from "vue";

const props = defineProps({
    characters: Array,
    regions: Array,
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
        <div class="max-w-2xl mx-auto px-4">
            <h1 class="text-4xl font-bold mb-2 text-center">
                Genshin Archives
            </h1>
            <p class="text-center text-gray-600 mb-8">
                Welcome to the Genshin Archives page!
            </p>

            <!-- Search -->
            <input
                v-model="searchQuery"
                type="text"
                placeholder="Search characters..."
                class="w-full max-w-md mx-auto block p-2 border rounded mb-10"
            />
            <div class="">
                <!-- CHARACTERS -->
                <section class="mb-16">
                    <h2 class="text-2xl font-semibold mb-4 text-center">
                        Characters
                    </h2>

                    <div
                        v-if="characters.length === 0"
                        class="text-center text-gray-500"
                    >
                        Add some characters to see them listed here.
                    </div>

                    <ul
                        v-else-if="filteredCharacters.length > 0"
                        class="space-y-4"
                    >
                        <li
                            v-for="character in filteredCharacters"
                            :key="character.id"
                            class="p-4 bg-white rounded-lg shadow hover:shadow-lg transition-shadow flex flex-wrap gap-6 justify-between items-center"
                        >
                            <div>
                                <span
                                    class="block text-gray-500 text-sm font-medium"
                                >
                                    Name
                                </span>
                                <span class="block text-lg font-semibold">
                                    {{ character.name }}
                                </span>
                            </div>

                            <div>
                                <span
                                    class="block text-gray-500 text-sm font-medium"
                                >
                                    Element
                                </span>
                                <span>{{ character.element }}</span>
                            </div>

                            <div>
                                <span
                                    class="block text-gray-500 text-sm font-medium"
                                >
                                    Weapon
                                </span>
                                <span>{{ character.weapon_type }}</span>
                            </div>

                            <div>
                                <span
                                    class="block text-gray-500 text-sm font-medium"
                                >
                                    Rarity
                                </span>
                                <span>{{ character.rarity }}★</span>
                            </div>
                        </li>
                    </ul>

                    <p v-else class="text-center text-gray-500">
                        No characters match your search.
                    </p>
                </section>

                <!-- REGIONS -->
                <section>
                    <h2 class="text-2xl font-semibold mb-4 text-center">
                        Regions
                    </h2>

                    <ul class="space-y-4">
                        <li
                            v-for="region in regions"
                            :key="region.id"
                            class="p-4 bg-white rounded-lg shadow hover:shadow-lg transition-shadow grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"
                        >
                            <div>
                                <span
                                    class="block text-gray-500 text-sm font-medium"
                                >
                                    Region
                                </span>
                                <span>{{ region.name }}</span>
                            </div>

                            <div>
                                <span
                                    class="block text-gray-500 text-sm font-medium"
                                >
                                    Description
                                </span>
                                <span>{{ region.description }}</span>
                            </div>

                            <div>
                                <span
                                    class="block text-gray-500 text-sm font-medium"
                                >
                                    Local Specialty
                                </span>
                                <span>{{ region.local_specialty }}</span>
                            </div>

                            <div>
                                <span
                                    class="block text-gray-500 text-sm font-medium"
                                >
                                    Elite Boss
                                </span>
                                <span>{{ region.elite_boss }}</span>
                            </div>

                            <div>
                                <span
                                    class="block text-gray-500 text-sm font-medium"
                                >
                                    World Boss
                                </span>
                                <span>{{ region.world_boss }}</span>
                            </div>
                        </li>
                    </ul>
                </section>
            </div>
        </div>
    </AppLayout>
</template>
