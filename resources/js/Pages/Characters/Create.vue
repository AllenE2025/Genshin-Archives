<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    element: "",
    weapon_type: "",
    rarity: "",
    image: null,
});

const elementWithColors = {
    Anemo: "text-green-400",
    Geo: "text-yellow-600",
    Electro: "text-purple-600",
    Dendro: "text-green-600",
    Hydro: "text-blue-600",
    Pyro: "text-red-600",
    Cryo: "text-blue-400",
};

const weaponTypes = ["Sword", "Claymore", "Polearm", "Bow", "Catalyst"];

function submit() {
    form.post(route("characters.store"));
}
</script>

<template>
    <AppLayout>
        <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Add Character</h1>
                <Link
                    :href="route('characters.index')"
                    class="px-4 py-2 bg-gray-400 text-white rounded shadow hover:bg-gray-500"
                >
                    Go Back
                </Link>
            </div>
            <form @submit.prevent="submit" class="space-y-5">
                <div class="mb-4">
                    <label class="block font-medium mb-1">Name</label>
                    <input
                        v-model="form.name"
                        type="text"
                        class="w-full border rounded px-3 py-2"
                    />
                    <p
                        v-if="form.errors.name"
                        class="text-red-600 text-sm mt-1"
                    >
                        {{ form.errors.name }}
                    </p>
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1">Element</label>
                    <div class="flex flex-col space-y-1">
                        <label
                            v-for="(color, element) in elementWithColors"
                            :key="element"
                            class="flex items-center space-x-2"
                        >
                            <input
                                type="radio"
                                :value="element"
                                v-model="form.element"
                            />
                            <span :class="color">{{ element }}</span>
                        </label>
                    </div>
                    <p
                        v-if="form.errors.element"
                        class="text-red-600 text-sm mt-1"
                    >
                        {{ form.errors.element }}
                    </p>
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1">Weapon Type</label>
                    <div class="flex flex-col space-y-1">
                        <label
                            v-for="wt in weaponTypes"
                            :key="wt"
                            class="flex items-center space-x-2"
                        >
                            <input
                                type="radio"
                                :value="wt"
                                v-model="form.weapon_type"
                            />
                            <span>{{ wt }}</span>
                        </label>
                    </div>
                    <p
                        v-if="form.errors.weapon_type"
                        class="text-red-600 text-sm mt-1"
                    >
                        {{ form.errors.weapon_type }}
                    </p>
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1">Rarity</label>
                    <div class="flex space-x-4">
                        <label
                            v-for="r in [4, 5]"
                            :key="r"
                            class="flex items-center space-x-2"
                        >
                            <input
                                type="radio"
                                :value="r"
                                v-model="form.rarity"
                            />
                            <span
                                :class="
                                    r === 5
                                        ? 'text-yellow-600'
                                        : 'text-purple-600'
                                "
                                >{{ r }}★</span
                            >
                        </label>
                    </div>
                    <p
                        v-if="form.errors.rarity"
                        class="text-red-600 text-sm mt-1"
                    >
                        {{ form.errors.rarity }}
                    </p>
                </div>

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    Add
                </button>
            </form>
        </div>
    </AppLayout>
</template>
