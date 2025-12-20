<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router } from "@inertiajs/vue3";

const props = defineProps({
    regions: Array,
});

const deleteRegion = (id) => {
    if (confirm("Are you sure you want to delete this region?")) {
        router.delete(route("regions.destroy", id));
    }
};
</script>

<template>
    <AppLayout>
        <div class="max-w-3xl mx-auto mt-10 p-4">
            <!-- Header -->
            <div class="text-center mb-6">
                <h1 class="text-4xl font-bold mb-2">Regions</h1>
                <p class="text-gray-600">Explore the various regions of Teyvat!</p>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end mb-6 space-x-4">
                <Link
                    :href="route('regions.create')"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition-all duration-300"
                >
                    Create New Region
                </Link>
                <Link
                    :href="route('home')"
                    class="px-4 py-2 bg-gray-400 text-white rounded shadow hover:bg-gray-500"
                >
                    Home
                </Link>
            </div>

            <!-- Region List -->
            <ul class="space-y-4">
                <li
                    v-for="region in regions"
                    :key="region.id"
                    class="p-5 bg-white rounded-lg shadow"
                >
                    <!-- Region Info -->
                    <h2 class="text-2xl font-semibold mb-2">{{ region.name }}</h2>
                    <p class="text-gray-700 mb-3">{{ region.description }}</p>

                    <!-- Region Details Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                        <div>
                            <span class="block text-gray-500 font-medium">Local Specialty</span>
                            <span>{{ region.local_specialty }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 font-medium">Elite Boss</span>
                            <span>{{ region.elite_boss }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 font-medium">World Boss</span>
                            <span>{{ region.world_boss }}</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-4 flex space-x-2">
                        <Link
                            :href="route('regions.edit', region.id)"
                            class="px-3 py-1 text-yellow-600 hover:bg-yellow-100 rounded-lg hover:scale-105 transition-transform"
                        >
                            Edit 
                        </Link>
                        <button
                            @click="deleteRegion(region.id)"
                            class="px-3 py-1 text-red-600 hover:bg-red-100 rounded-lg hover:scale-105 transition-transform"
                        >
                            Delete 
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </AppLayout>
</template>
