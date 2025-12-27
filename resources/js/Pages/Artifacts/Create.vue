<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    piece: "",
    set_bonus: "",
    rarity: null,
});

const rarityOptions = {
    3: "text-blue-600",
    4: "text-purple-600",
    5: "text-yellow-600",
};

const submit = () => {
    form.post(route("artifacts.store"));
};
</script>

<template>
    <AppLayout>
        <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">
                    Create Artifact
                </h1>

                <Link
                    :href="route('artifacts.index')"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition"
                >
                    Go Back
                </Link>
            </div>

            <!-- Form -->
            <form @submit.prevent="submit" class="space-y-4">
                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Name
                    </label>
                    <input
                        v-model="form.name"
                        type="text"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    />
                    <p
                        v-if="form.errors.name"
                        class="text-sm text-red-600 mt-1"
                    >
                        {{ form.errors.name }}
                    </p>
                </div>

                <!-- Piece -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Piece
                    </label>
                    <input
                        v-model="form.piece"
                        type="text"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    />
                    <p
                        v-if="form.errors.piece"
                        class="text-sm text-red-600 mt-1"
                    >
                        {{ form.errors.piece }}
                    </p>
                </div>

                <!-- Set Bonus -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Set Bonus
                    </label>
                    <input
                        v-model="form.set_bonus"
                        type="text"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    />
                    <p
                        v-if="form.errors.set_bonus"
                        class="text-sm text-red-600 mt-1"
                    >
                        {{ form.errors.set_bonus }}
                    </p>
                </div>

                <!-- Rarity -->
                <section>
                    <p class="text-sm font-medium text-gray-700 mb-2">Rarity</p>

                    <div class="flex gap-4">
                        <label
                            v-for="(color, r) in rarityOptions"
                            :key="r"
                            class="flex items-center gap-2 cursor-pointer"
                        >
                            <input
                                type="radio"
                                :value="r"
                                v-model="form.rarity"
                                class="rounded border-gray-300"
                            />
                            <span :class="['font-semibold', color]">
                                {{ r }}★
                            </span>
                        </label>
                    </div>

                    <p
                        v-if="form.errors.rarity"
                        class="text-sm text-red-600 mt-1"
                    >
                        {{ form.errors.rarity }}
                    </p>
                </section>

                <!-- Submit -->
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    {{ form.processing ? "Creating..." : "Create Artifact" }}
                </button>
            </form>
        </div>
    </AppLayout>
</template>
