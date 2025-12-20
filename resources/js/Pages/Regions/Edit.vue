<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm, Link } from "@inertiajs/vue3";

interface Region {
    id: number;
    name: string;
    description: string;
    local_specialty: string;
    world_boss: string;
}

const props = defineProps<{ region: Region }>();

// Initialize the form with the region props
const form = useForm({
    ...props.region,
});

// Submit function for updating the region
function submit() {
    form.put(route("regions.update", form.id));
}
</script>

<template>
    <AppLayout>
        <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
            <form @submit.prevent="submit">
                <!-- Header -->
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">Edit Region</h1>
                    <Link
                        :href="route('regions.index')"
                        class="px-4 py-2 bg-gray-400 text-white rounded shadow hover:bg-gray-500"
                    >
                        Go Back
                    </Link>
                </div>

                <!-- Name -->
                <div class="mb-4">
                    <label class="block font-medium mb-1">Name</label>
                    <input
                        v-model="form.name"
                        type="text"
                        class="w-full border rounded px-3 py-2"
                    />
                    <p v-if="form.errors.name" class="text-red-600 text-sm mt-1">
                        {{ form.errors.name }}
                    </p>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label class="block font-medium mb-1">Description</label>
                    <textarea
                        v-model="form.description"
                        class="w-full border rounded px-3 py-2"
                    ></textarea>
                    <p v-if="form.errors.description" class="text-red-600 text-sm mt-1">
                        {{ form.errors.description }}
                    </p>
                </div>

                <!-- Local Specialty -->
                <div class="mb-4">
                    <label class="block font-medium mb-1">Local Specialty</label>
                    <input
                        v-model="form.local_specialty"
                        type="text"
                        class="w-full border rounded px-3 py-2"
                    />
                    <p v-if="form.errors.local_specialty" class="text-red-600 text-sm mt-1">
                        {{ form.errors.local_specialty }}
                    </p>
                </div>

                <!-- World Boss -->
                <div class="mb-4">
                    <label class="block font-medium mb-1">World Boss</label>
                    <input
                        v-model="form.world_boss"
                        type="text"
                        class="w-full border rounded px-3 py-2"
                    />
                    <p v-if="form.errors.world_boss" class="text-red-600 text-sm mt-1">
                        {{ form.errors.world_boss }}
                    </p>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition-colors"
                    :disabled="form.processing"
                >
                    Update Region
                </button>
            </form>
        </div>
    </AppLayout>
</template>
