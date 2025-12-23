<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";

// Form state
const form = useForm({
    name: "",
    description: "",
    local_specialty: "",
    elite_boss: "",
    world_boss: "",
});

// Submit function
function submit() {
    form.post(route("regions.store"));
}
</script>

<template>
    <AppLayout>
        <div class="max-w-3xl mx-auto mt-10 p-4">
            <!-- Back Link -->
            <Link
                :href="route('regions.index')"
                class="inline-block mb-6 px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition-all duration-300"
            >
                Back to Regions
            </Link>

            <div class="bg-white p-6 rounded-lg shadow">
                <!-- Header -->
                <div class="text-center mb-6">
                    <h1 class="text-4xl font-bold mb-2">Add New Region</h1>
                    <p class="text-gray-600">
                        Fill out the form below to add a new region to Teyvat.
                    </p>
                </div>

                <!-- Form -->
                <form @submit.prevent="submit" class="space-y-5">
                    <!-- Region Name -->
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-600 mb-1"
                            >Region Name</label
                        >
                        <input
                            v-model="form.name"
                            type="text"
                            class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Enter region name"
                        />
                        <p
                            v-if="form.errors.name"
                            class="text-red-600 text-sm mt-1"
                        >
                            {{ form.errors.name }}
                        </p>
                    </div>

                    <!-- Description -->
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-600 mb-1"
                            >Description</label
                        >
                        <textarea
                            v-model="form.description"
                            rows="3"
                            class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Enter region description"
                        ></textarea>
                        <p
                            v-if="form.errors.description"
                            class="text-red-600 text-sm mt-1"
                        >
                            {{ form.errors.description }}
                        </p>
                    </div>

                    <!-- Local Specialty -->
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-600 mb-1"
                            >Local Specialty</label
                        >
                        <input
                            v-model="form.local_specialty"
                            type="text"
                            class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Enter local specialty"
                        />
                        <p
                            v-if="form.errors.local_specialty"
                            class="text-red-600 text-sm mt-1"
                        >
                            {{ form.errors.local_specialty }}
                        </p>
                    </div>

                    <!-- Bosses Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Elite Boss -->
                        <div>
                            <label
                                class="block text-sm font-medium text-gray-600 mb-1"
                                >Elite Boss</label
                            >
                            <input
                                v-model="form.elite_boss"
                                type="text"
                                class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                placeholder="Enter elite boss"
                            />
                            <p
                                v-if="form.errors.elite_boss"
                                class="text-red-600 text-sm mt-1"
                            >
                                {{ form.errors.elite_boss }}
                            </p>
                        </div>

                        <!-- World Boss -->
                        <div>
                            <label
                                class="block text-sm font-medium text-gray-600 mb-1"
                                >World Boss</label
                            >
                            <input
                                v-model="form.world_boss"
                                type="text"
                                class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                placeholder="Enter world boss"
                            />
                            <p
                                v-if="form.errors.world_boss"
                                class="text-red-600 text-sm mt-1"
                            >
                                {{ form.errors.world_boss }}
                            </p>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            Add Region
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>
