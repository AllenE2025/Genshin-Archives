<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <AppLayout>
        <div class="max-w-3xl mx-auto mt-10 p-4">
            <h1 class="text-4xl font-bold mb-4 text-center">Regions</h1>
            <p class="text-center text-gray-600 mb-6">
                Explore the various regions of Teyvat!
            </p>
            <Link
                :href="route('regions.create')"
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors mb-6 inline-block"
            >
                Create New Region
            </Link>
            <!-- Additional content for regions can be added here -->
        </div>
    </AppLayout>
</template>
