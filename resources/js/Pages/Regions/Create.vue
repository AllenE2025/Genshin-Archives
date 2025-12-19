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
const errors = ref({});
const disabled = ref(false);

function submit() {
    if (disabled.value) return; // prevent multiple clicks
    disabled.value = true;

    router.post(route("regions.store"), form.value, {
        onSuccess: () => {
            disabled.value = false;
            router.visit(route("regions.index"));
        },
        onError: (err) => {
            disabled.value = false;
            errors.value = err;
        },
    });
}
</script>
<template>
    <AppLayout>
        <div class="max-w-3xl mx-auto mt-10 p-4">
            <Link
                :href="route('regions.index')"
                class="inline-block mb-6 px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition-all duration-300"
            >
                ← Back to Regions
            </Link>

            <div class="bg-white p-6 rounded-lg shadow">
                <div class="text-center mb-6">
                    <h1 class="text-4xl font-bold mb-2">Create New Region</h1>
                    <p class="text-gray-600">
                        Fill out the form below to add a new region to Teyvat.
                    </p>
                </div>

                <form @submit.prevent="submit" class="space-y-5">
                    <!-- Region Name -->
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-600 mb-1"
                        >
                            Region Name
                        </label>
                        <input
                            v-model="form.name"
                            type="text"
                            class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Enter region name"
                        />
                        <p v-if="errors.name" class="text-red-600 text-sm mt-1">
                            {{ errors.name }}
                        </p>
                    </div>

                    <!-- Description -->
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-600 mb-1"
                        >
                            Description
                        </label>
                        <textarea
                            v-model="form.description"
                            rows="3"
                            class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Enter region description"
                        ></textarea>
                        <p
                            v-if="errors.description"
                            class="text-red-600 text-sm mt-1"
                        >
                            {{ errors.description }}
                        </p>
                    </div>

                    <!-- Local Specialty -->
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-600 mb-1"
                        >
                            Local Specialty
                        </label>
                        <input
                            v-model="form.local_specialty"
                            type="text"
                            class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Enter local specialty"
                        />
                        <p
                            v-if="errors.local_specialty"
                            class="text-red-600 text-sm mt-1"
                        >
                            {{ errors.local_specialty }}
                        </p>
                    </div>

                    <!-- Bosses -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label
                                class="block text-sm font-medium text-gray-600 mb-1"
                            >
                                Elite Boss
                            </label>
                            <input
                                v-model="form.elite_boss"
                                type="text"
                                class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                placeholder="Enter elite boss"
                            />
                            <p
                                v-if="errors.elite_boss"
                                class="text-red-600 text-sm mt-1"
                            >
                                {{ errors.elite_boss }}
                            </p>
                        </div>

                        <div>
                            <label
                                class="block text-sm font-medium text-gray-600 mb-1"
                            >
                                World Boss
                            </label>
                            <input
                                v-model="form.world_boss"
                                type="text"
                                class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                placeholder="Enter world boss"
                            />
                            <p
                                v-if="errors.world_boss"
                                class="text-red-600 text-sm mt-1"
                            >
                                {{ errors.world_boss }}
                            </p>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            :disabled="disabled"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            Create Region
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>
