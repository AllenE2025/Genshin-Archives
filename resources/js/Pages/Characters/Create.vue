<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router } from "@inertiajs/vue3";
import { ref } from "vue";

const form = ref({
    name: "",
    element: "",
    weapon_type: "",
    rarity: "",
    image: null,
});
const errors = ref({});

const disabled = ref(false);

function submit() {
    if (disabled.value) return; // prevent multiple clicks
    disabled.value = true;

    router.post(route("characters.store"), form.value, {
        onSuccess: () => {
            disabled.value = false;
            router.visit(route("characters.index"));
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
        <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Create Character</h1>
                <Link
                    :href="route('characters.index')"
                    class="px-4 py-2 bg-gray-600 text-white rounded shadow hover:bg-gray-700"
                >
                    Go Back
                </Link>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Name</label>
                <input
                    v-model="form.name"
                    type="text"
                    class="w-full border rounded px-3 py-2"
                />
                <p v-if="errors.name" class="text-red-600 text-sm mt-1">
                    {{ errors.name }}
                </p>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Element</label>
                <div class="flex-row space-y-1">
                    <label class="flex items-center space-x-2">
                        <input
                            type="radio"
                            value="Geo"
                            v-model="form.element"
                        />
                        <span>Geo</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input
                            type="radio"
                            value="Anemo"
                            v-model="form.element"
                        />
                        <span>Anemo</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input
                            type="radio"
                            value="Pyro"
                            v-model="form.element"
                        />
                        <span>Pyro</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input
                            type="radio"
                            value="Hydro"
                            v-model="form.element"
                        />
                        <span>Hydro</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input
                            type="radio"
                            value="Cryo"
                            v-model="form.element"
                        />
                        <span>Cryo</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input
                            type="radio"
                            value="Electro"
                            v-model="form.element"
                        />
                        <span>Electro</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input
                            type="radio"
                            value="Dendro"
                            v-model="form.element"
                        />
                        <span>Dendro</span>
                    </label>
                </div>
                <p v-if="errors.element" class="text-red-600 text-sm mt-1">
                    {{ errors.element }}
                </p>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Weapon Type</label>
                <div class="flex-row space-y-1">
                    <label class="flex items-center space-x-2">
                        <input
                            type="radio"
                            value="Polearm"
                            v-model="form.weapon_type"
                        />
                        <span>Polearm</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input
                            type="radio"
                            value="Sword"
                            v-model="form.weapon_type"
                        />
                        <span>Sword</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input
                            type="radio"
                            value="Claymore"
                            v-model="form.weapon_type"
                        />
                        <span>Claymore</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input
                            type="radio"
                            value="Bow"
                            v-model="form.weapon_type"
                        />
                        <span>Bow</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input
                            type="radio"
                            value="Catalyst"
                            v-model="form.weapon_type"
                        />
                        <span>Catalyst</span>
                    </label>
                </div>
                <p v-if="errors.weapon_type" class="text-red-600 text-sm mt-1">
                    {{ errors.weapon_type }}
                </p>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Rarity</label>
                <div class="flex space-x-4">
                    <label class="flex items-center space-x-2">
                        <input type="radio" value="4" v-model="form.rarity" />
                        <span>4★</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" value="5" v-model="form.rarity" />
                        <span>5★</span>
                    </label>
                </div>
                <p v-if="errors.rarity" class="text-red-600 text-sm mt-1">
                    {{ errors.rarity }}
                </p>
            </div>

            <button
                @click="submit"
                :disabled="disabled"
                class="px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed"
            >
                Add
            </button>
        </div>
    </AppLayout>
</template>
