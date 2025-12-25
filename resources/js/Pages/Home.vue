<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { computed, ref } from "vue";

const props = defineProps({
    characters: Array,
    regions: Array,
});

const elementColors = {
    Anemo: "text-green-400",
    Geo: "text-yellow-600",
    Electro: "text-purple-600",
    Dendro: "text-green-600",
    Hydro: "text-blue-600",
    Pyro: "text-red-600",
    Cryo: "text-blue-400",
};

const weaponTypes = ["Sword", "Claymore", " Polearm", "Bow", "Catalyst"];

const searchQuery = ref("");

const selectedFilter = ref("Alphabetical");

const showFilterOptions = ref(false);

const searchedCharacters = computed(() => {
    if (!searchQuery.value) return props.characters;

    return props.characters.filter((character) =>
        character.name.toLowerCase().includes(searchQuery.value.toLowerCase())
    );
});

const filteredCharacters = computed(() => {
    const result = [...searchedCharacters.value];

    switch (selectedFilter.value) {
        case "Alphabetical":
            return result.sort((a, b) => a.name.localeCompare(b.name));
        case "Rarity":
            return result.sort((a, b) => b.rarity - a.rarity);
        case "Element":
            return result.sort((a, b) => a.element.localeCompare(b.element));
        case "Weapon Type":
            return result.sort((a, b) =>
                a.weapon_type.localeCompare(b.weapon_type)
            );
        default:
            return result;
    }
});
</script>

<template>
    <AppLayout>
        <div class="max-w-none mx-auto px-4">
            <h1 class="text-4xl font-bold mb-2 text-center">
                Genshin Archives
            </h1>
            <p class="text-center text-gray-600 mb-8">
                Welcome to the Genshin Archives page!
            </p>
            <div
                class="flex flex-col md:flex-row md:items-center md:justify-center gap-4 mb-6 flex-wrap"
            >
                <!-- Search -->
                <input
                    v-model="searchQuery"
                    type="text"
                    placeholder="Search characters..."
                    class="flex-1 min-w-[220px] md:max-w-md p-2 border border-gray-300 rounded shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"
                />

                <!-- Filter Dropdown -->
                <select
                    v-model="selectedFilter"
                    class="w-full md:w-36 p-2 border border-gray-300 rounded shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"
                >
                    <option value="Alphabetical">Alphabetical</option>
                    <option value="Rarity">Rarity</option>
                    <option value="Element">Element</option>
                    <option value="Weapon Type">Weapon Type</option>
                </select>

                <!-- Filter Button -->
                <button
                    @click="showFilterOptions = true"
                    class="bg-white rounded-lg shadow py-2 px-4 hover:bg-gray-100 transition"
                >
                    Filter
                </button>

                <!-- Filter Modal -->
                <div
                    v-if="showFilterOptions"
                    class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center"
                >
                    <div
                        class="bg-white w-full max-w-md rounded-xl shadow-lg p-6 relative"
                    >
                        <!-- Close Button -->
                        <button
                            @click="showFilterOptions = false"
                            class="absolute top-3 right-3 text-gray-500 hover:text-black"
                        >
                            ✕
                        </button>

                        <!-- Title -->
                        <h3 class="text-xl font-semibold mb-4 text-center">
                            Filter Characters
                        </h3>

                        <!-- Element Filter -->
                        <section class="space-y-3">
                            <p class="font-medium text-gray-700">Element</p>

                            <div class="grid grid-cols-2 gap-2">
                                <label
                                    class="flex items-center gap-2"
                                    v-for="(color, element) in elementColors"
                                    :key="element"
                                >
                                    <input
                                        type="checkbox"
                                        class="rounded border-gray-300"
                                    />
                                    <span>{{ element }}</span>
                                </label>
                            </div>
                        </section>

                        <section class="space-y-3 py-3">
                            <p class="font-medium text-gray-700">Weapon Type</p>

                            <div class="grid grid-cols-2 gap-2">
                                <label
                                    class="flex items-center gap-2"
                                    v-for="weapon_type in weaponTypes"
                                    :key="weapon_type"
                                >
                                    <input
                                        type="checkbox"
                                        class="rounded border-gray-300"
                                    />
                                    <span>{{ weapon_type }}</span>
                                </label>
                            </div>
                        </section>

                        <section class="space-y-3 py-3">
                            <p class="font-medium text-gray-700">Rarity</p>

                            <div class="grid grid-cols-2 gap-2">
                                <label
                                    class="flex items-center gap-2"
                                    v-for="r in [4, 5]"
                                >
                                    <input
                                        type="checkbox"
                                        class="rounded border-gray-300"
                                    />
                                    <span>{{ r }}★</span>
                                </label>
                            </div>
                        </section>

                        <!-- Action Buttons -->
                        <div class="mt-6 flex justify-end gap-2">
                            <button
                                @click="showFilterOptions = false"
                                class="px-4 py-2 rounded border"
                            >
                                Cancel
                            </button>

                            <button
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
                            >
                                Apply
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex gap-16 justify-center flex-wrap">
                <!-- CHARACTERS -->
                <section class="mb-16 w-full max-w-3xl">
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
                            class="p-4 bg-white rounded-lg shadow hover:shadow-lg transition-shadow flex flex-wrap gap-6 justify-evenly items-center"
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
                                <span
                                    :class="elementColors[character.element]"
                                    >{{ character.element }}</span
                                >
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
                                <span
                                    :class="
                                        character.rarity === 5
                                            ? 'text-yellow-600'
                                            : 'text-purple-600'
                                    "
                                    >{{ character.rarity }}★</span
                                >
                            </div>
                        </li>
                    </ul>

                    <p v-else class="text-center text-gray-500">
                        No characters match your search.
                    </p>
                </section>

                <!-- REGIONS -->
                <section class="mb-16 w-full max-w-3xl">
                    <h2 class="text-2xl font-semibold mb-4 text-center">
                        Regions
                    </h2>

                    <ul class="space-y-4">
                        <li
                            v-for="region in regions"
                            :key="region.id"
                            class="p-4 bg-white rounded-lg shadow hover:shadow-lg transition-shadow grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 place-items-center text-center"
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
