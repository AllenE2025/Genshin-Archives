<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    regions: Array,
});
</script>
<template>
    <AppLayout>
        <div class="max-w-3xl mx-auto mt-10 p-4">
            <div class="text-center mb-6">
                <h1 class="text-4xl font-bold mb-2">Regions</h1>
                <p class="text-gray-600">
                    Explore the various regions of Teyvat!
                </p>
            </div>

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

            <ul class="space-y-4">
                <li
                    v-for="region in regions"
                    :key="region.id"
                    class="p-5 bg-white rounded-lg shadow transition-all duration-300 hover:shadow-xl hover:-translate-y-1"
                >
                    <h2 class="text-2xl font-semibold mb-2">
                        {{ region.name }}
                    </h2>

                    <p class="text-gray-700 mb-3">
                        {{ region.description }}
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                        <div>
                            <span class="block text-gray-500 font-medium">
                                Local Specialty
                            </span>
                            <span>{{ region.local_specialty }}</span>
                        </div>

                        <div>
                            <span class="block text-gray-500 font-medium">
                                Elite Boss
                            </span>
                            <span>{{ region.elite_boss }}</span>
                        </div>

                        <div>
                            <span class="block text-gray-500 font-medium">
                                World Boss
                            </span>
                            <span>{{ region.world_boss }}</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </AppLayout>
</template>
