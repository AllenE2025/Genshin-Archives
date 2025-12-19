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
                    class="px-4 py-2 bg-gray-400 text-white rounded shadow hover:bg-gray-500"
                >
                    Go Back
                </Link>
            </div>
            <form>
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
                    <div class="flex flex-col space-y-1">
                        <label
                            v-for="el in [
                                'Geo',
                                'Anemo',
                                'Pyro',
                                'Hydro',
                                'Cryo',
                                'Electro',
                                'Dendro',
                            ]"
                            :key="el"
                            class="flex items-center space-x-2"
                        >
                            <input
                                type="radio"
                                :value="el"
                                v-model="form.element"
                            />
                            <span>{{ el }}</span>
                        </label>
                    </div>
                    <p v-if="errors.element" class="text-red-600 text-sm mt-1">
                        {{ errors.element }}
                    </p>
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1">Weapon Type</label>
                    <div class="flex flex-col space-y-1">
                        <label
                            v-for="wt in [
                                'Polearm',
                                'Sword',
                                'Claymore',
                                'Bow',
                                'Catalyst',
                            ]"
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
                        v-if="errors.weapon_type"
                        class="text-red-600 text-sm mt-1"
                    >
                        {{ errors.weapon_type }}
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
                            <span>{{ r }}★</span>
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
            </form>
        </div>
    </AppLayout>
</template>
