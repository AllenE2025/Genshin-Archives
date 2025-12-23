<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router } from "@inertiajs/vue3";
import { computed, ref } from "vue";
const props = defineProps({
    artifacts: Array,
});
</script>
<template>
    <AppLayout>
        <div class="max-w-3xl mx-auto mt-10 p-4">
            <!-- Header -->
            <div class="text-center mb-6">
                <h1 class="text-4xl font-bold mb-2">Artifacts</h1>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end mb-6 space-x-4">
                <Link
                    :href="route('artifacts.create')"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition-all duration-300"
                >
                    Add New Artifact
                </Link>
                <Link
                    :href="route('home')"
                    class="px-4 py-2 bg-gray-400 text-white rounded shadow hover:bg-gray-500"
                >
                    Home
                </Link>
            </div>
            <div v-if="artifacts.length === 0" class="text-gray-500">
                No Artifacts found.
            </div>
            <!-- Artifact List -->
            <ul class="space-y-4">
                <li
                    v-for="artifact in artifacts"
                    :key="artifact.id"
                    class="p-5 bg-white rounded-lg shadow"
                >
                    <!-- Artifact Info -->
                    <h2 class="text-2xl font-semibold mb-2">
                        {{ artifact.name }}
                    </h2>
                    <p class="text-gray-700 mb-3">{{ artifact.description }}</p>

                    <!-- Artifact Details Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                        <div>
                            <span class="block text -gray-500 font-medium"
                                >Set Bonus</span
                            >
                            <span>{{ artifact.set_bonus }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 font-medium"
                                >Main Stat</span
                            >
                            <span>{{ artifact.main_stat }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 font-medium"
                                >Sub Stats</span
                            >
                            <span>{{ artifact.sub_stats }}</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </AppLayout>
</template>
