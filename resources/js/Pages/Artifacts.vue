<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    artifacts: Array,
});
</script>

<template>
    <AppLayout>
        <div class="max-w-3xl mx-auto mt-10 px-4">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-gray-800">Artifacts</h1>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-3 mb-6">
                <Link
                    :href="route('artifacts.create')"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition"
                >
                    Add New Artifact
                </Link>

                <Link
                    :href="route('home')"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition"
                >
                    Home
                </Link>
            </div>

            <!-- Empty State -->
            <div
                v-if="artifacts.length === 0"
                class="text-center text-gray-500 py-10"
            >
                No artifacts found.
            </div>

            <!-- Artifact List -->
            <ul class="space-y-5">
                <li
                    v-for="artifact in artifacts"
                    :key="artifact.id"
                    class="p-6 bg-white rounded-xl shadow-sm border"
                >
                    <!-- Artifact Name -->
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">
                        {{ artifact.name }}
                    </h2>

                    <!-- Artifact Details -->
                    <div
                        class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-sm text-gray-700"
                    >
                        <!-- Set Bonuses -->
                        <div class="sm:col-span-2 space-y-2">
                            <span class="block text-gray-500 font-medium">
                                Set Bonus
                            </span>

                            <div>
                                <p class="font-semibold">2-Piece Bonus</p>
                                <p class="text-gray-600">
                                    {{ artifact.two_piece_bonus }}
                                </p>
                            </div>

                            <div>
                                <p class="font-semibold">4-Piece Bonus</p>
                                <p class="text-gray-600">
                                    {{ artifact.four_piece_bonus }}
                                </p>
                            </div>
                        </div>

                        <!-- Rarity -->
                        <div>
                            <span class="block text-gray-500 font-medium">
                                Rarity
                            </span>
                            <p class="text-lg font-semibold">
                                {{ artifact.rarity }} ★
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </AppLayout>
</template>
