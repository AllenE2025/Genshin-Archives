<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router } from "@inertiajs/vue3";
import { ref } from "vue";

const form = ref({
    name: "",
    description: "",
    local_specialty: "",
    elite_boss: "",
    world_boss: "",
});
</script>
<template>
    <AppLayout>
        <div class="max-w-3xl mx-auto mt-10 p-4">
            <Link
                :href="route('regions.index')"
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors mb-6 inline-block"
                >Back to Regions</Link
            >
            <h1 class="text-4xl font-bold mb-4 text-center">
                Create New Region
            </h1>
            <p class="text-center text-gray-600 mb-6">
                Fill out the form below to add a new region to Teyvat.
            </p>
            <form class="space-y-4">
                <div>
                    <label
                        for="name"
                        class="block text-gray-700 font-medium mb-2"
                        >Region Name</label
                    >
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="w-full p-2 border rounded"
                        placeholder="Enter region name"
                    />
                </div>
                <div>
                    <label
                        for="description"
                        class="block text-gray-700 font-medium mb-2"
                        >Description</label
                    >
                    <textarea
                        id="description"
                        name="description"
                        class="w-full p-2 border rounded"
                        placeholder="Enter region description"
                    ></textarea>
                </div>
                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors"
                >
                    Create Region
                </button>
            </form>
        </div>
    </AppLayout>
</template>
