<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    description: "",
    set_bonus: "",
    main_stat: "",
    sub_stats: "",
});
</script>
<template>
    <AppLayout>
        <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
            <form>
                <!-- Header -->
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">Create Artifact</h1>
                    <Link
                        :href="route('artifacts.index')"
                        class="px-4 py-2 bg-gray-400 text-white rounded shadow hover:bg-gray-500"
                    >
                        Go Back
                    </Link>
                </div>

                <!-- Form Fields -->
                <div class="mb-4">
                    <label class="block font-medium mb-1">Name</label>
                    <input
                        type="text"
                        class="w-full border rounded px-3 py-2"
                    />
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1">Description</label>
                    <textarea
                        class="w-full border rounded px-3 py-2"
                    ></textarea>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition-all duration-300"
                >
                    Create Artifact
                </button>
            </form>
        </div>
    </AppLayout>
</template>