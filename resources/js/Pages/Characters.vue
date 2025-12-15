<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router } from "@inertiajs/vue3";

// Props or data for characters
defineProps({
    characters: Array,
});

// Methods
const deleteCharacter = (id) => {
    if (confirm("Are you sure you want to delete this character?")) {
        // Call Inertia to send DELETE request to your Laravel route
        router.delete(route("characters.destroy", id), {
            onSuccess: () => {
                // Refresh the page to update the list
                router.visit(route("characters.index"));
            },
        });
    }
};
</script>

<template>
    <AppLayout>
        <div class="max-w-3xl mx-auto mt-10 p-4">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Characters</h1>
                <div class="flex space-x-2">
                    <Link
                        :href="route('characters.create')"
                        class="px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700"
                    >
                        Add a Character
                    </Link>
                    <Link
                        :href="route('home')"
                        class="px-4 py-2 bg-gray-400 text-white rounded shadow hover:bg-gray-500"
                    >
                        Home
                    </Link>
                </div>
            </div>

            <div v-if="characters.length === 0" class="text-gray-500">
                Start by adding some characters!
            </div>

            <ul v-else class="space-y-3">
                <li
                    v-for="character in characters"
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
                    <div class="flex space-x-2">
                        <Link
                            :href="route('characters.edit', character.id)"
                            class="px-3 py-1 bg-yellow-500 text-white rounded shadow hover:bg-yellow-600"
                        >
                            Edit
                        </Link>
                        <button
                            @click="deleteCharacter(character.id)"
                            class="px-3 py-1 bg-red-600 text-white rounded shadow hover:bg-red-700"
                        >
                            Delete
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </AppLayout>
</template>
