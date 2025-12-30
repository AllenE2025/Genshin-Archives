<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm, Link } from "@inertiajs/vue3";

/* ------------------ Types ------------------ */
interface Artifact {
    id: number;
    name: string;
    two_piece_bonus: string;
    four_piece_bonus: string;
    rarity: number;
}

/* ------------------ Props ------------------ */
const props = defineProps<{
    artifact: Artifact;
}>();

/* ------------------ Form ------------------ */
const form = useForm({
    ...props.artifact,
});

/* ------------------ Methods ------------------ */
const submit = () => {
    form.put(route("artifacts.update", form.id));
};
</script>

<template>
    <AppLayout>
        <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Edit Artifact</h1>

                <Link
                    :href="route('artifacts.index')"
                    class="px-4 py-2 bg-gray-400 text-white rounded shadow hover:bg-gray-500"
                >
                    Go Back
                </Link>
            </div>

            <!-- Form -->
            <form @submit.prevent="submit" class="space-y-6">
                <!-- Name -->
                <section>
                    <label class="block mb-1 font-medium" for="artifact-name"
                        >Name</label
                    >
                    <input
                        id="artifact-name"
                        v-model="form.name"
                        type="text"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    />
                </section>

                <!-- Bonuses -->
                <section class="space-y-4">
                    <div>
                        <label
                            class="block mb-1 font-medium"
                            for="two-piece-bonus"
                            >2-Piece Bonus</label
                        >
                        <input
                            id="two-piece-bonus"
                            v-model="form.two_piece_bonus"
                            type="text"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        />
                    </div>

                    <div>
                        <label
                            class="block mb-1 font-medium"
                            for="four-piece-bonus"
                            >4-Piece Bonus</label
                        >
                        <textarea
                            id="four-piece-bonus"
                            v-model="form.four_piece_bonus"
                            rows="3"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
                        ></textarea>
                    </div>
                </section>

                <!-- Rarity -->
                <fieldset class="space-y-2">
                    <legend class="font-medium mb-2">Rarity</legend>
                    <div class="flex gap-4">
                        <label
                            v-for="r in [3, 4, 5]"
                            :key="r"
                            class="inline-flex items-center space-x-2 cursor-pointer"
                        >
                            <input
                                type="radio"
                                :value="r"
                                v-model="form.rarity"
                                class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500"
                            />
                            <span
                                :class="{
                                    'text-blue-600': r === 3,
                                    'text-purple-600': r === 4,
                                    'text-yellow-500': r === 5,
                                }"
                            >
                                {{ r }}★
                            </span>
                        </label>
                    </div>
                </fieldset>

                <!-- Submit -->
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    Update
                </button>
            </form>
        </div>
    </AppLayout>
</template>
