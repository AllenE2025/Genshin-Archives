<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    weapon_type: "",
    base_attack: "",
    sub_stat_type: "",
    sub_stat: "",
    rarity: "",
    passive: "",
});

const weaponTypes = ["Sword", "Claymore", "Polearm", "Bow", "Catalyst"];

const subStatType = [
    "ATK%",
    "CRIT Rate",
    "CRIT DMG",
    "Physical DMG Bonus",
    "Elemental Mastery",
    "Energy Recharge",
    "HP%",
    "DEF%",
];

const rarityOptions = {
    3: "text-blue-600",
    4: "text-purple-600",
    5: "text-yellow-600",
};

function submit() {
    form.post(route("weapons.store"));
}
</script>

<template>
    <AppLayout>
        <div class="max-w-md mx-auto mt-12 p-6 bg-white rounded-2xl shadow-lg">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Add Weapon</h1>
                <Link
                    :href="route('weapons.index')"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition-colors duration-200"
                >
                    Go Back
                </Link>
            </div>

            <form @submit.prevent="submit" class="space-y-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block font-semibold mb-2 text-gray-700">
                        Name
                    </label>
                    <input
                        id="name"
                        v-model="form.name"
                        type="text"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
                    />
                    <p
                        v-if="form.errors.name"
                        class="text-red-600 text-sm mt-1"
                    >
                        {{ form.errors.name }}
                    </p>
                </div>

                <!-- Weapon Type -->
                <fieldset class="border border-gray-200 rounded-lg p-4">
                    <legend class="font-semibold text-gray-700">Weapon Type</legend>
                    <div class="space-y-2 mt-2">
                        <label
                            v-for="wt in weaponTypes"
                            :key="wt"
                            class="flex items-center gap-2 cursor-pointer"
                        >
                            <input
                                v-model="form.weapon_type"
                                type="radio"
                                :value="wt"
                                class="h-4 w-4 text-blue-600 focus:ring-2 focus:ring-blue-400"
                            />
                            <span class="text-gray-800">{{ wt }}</span>
                        </label>
                        <p
                            v-if="form.errors.weapon_type"
                            class="text-red-600 text-sm mt-1"
                        >
                            {{ form.errors.weapon_type }}
                        </p>
                    </div>
                </fieldset>

                <!-- Base Attack -->
                <div>
                    <label for="base_attack" class="block font-semibold mb-2 text-gray-700">
                        Base Attack
                    </label>
                    <input
                        id="base_attack"
                        v-model="form.base_attack"
                        type="text"
                        @input="form.base_attack = form.base_attack.replace(/\D+/g,'')"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
                        placeholder="0"
                    />
                    <p
                        v-if="form.errors.base_attack"
                        class="text-red-600 text-sm mt-1"
                    >
                        {{ form.errors.base_attack }}
                    </p>
                </div>

                <!-- Sub Stat -->
                <fieldset class="border border-gray-200 rounded-lg p-4">
                    <legend class="font-semibold text-gray-700">Sub Stat</legend>
                    <div class="space-y-2 mt-2">
                        <label
                            v-for="sst in subStatType"
                            :key="sst"
                            class="flex items-center gap-2 cursor-pointer"
                        >
                            <input
                                v-model="form.sub_stat_type"
                                type="radio"
                                :value="sst"
                                class="h-4 w-4 text-green-600 focus:ring-2 focus:ring-green-400"
                            />
                            <span class="text-gray-800">{{ sst }}</span>
                        </label>
                        <p
                            v-if="form.errors.sub_stat"
                            class="text-red-600 text-sm mt-1"
                        >
                            {{ form.errors.sub_stat }}
                        </p>
                    </div>

                    <label for="sub_stat" class="block font-semibold mt-4 mb-2 text-gray-700">
                        Sub Stat Value
                    </label>
                    <input
                        type="text"
                        id="sub_stat"
                        v-model="form.sub_stat"
                        @input="form.sub_stat = form.sub_stat.replace(/\D+/g,'')"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition"
                        placeholder="0"
                    />
                    <p
                        v-if="form.errors.sub_stat_type"
                        class="text-red-600 text-sm mt-1"
                    >
                        {{ form.errors.sub_stat_type }}
                    </p>
                </fieldset>

                <!-- Rarity -->
                <fieldset class="border border-gray-200 rounded-lg p-4">
                    <legend class="font-semibold text-gray-700">Rarity</legend>
                    <div class="space-y-2 mt-2">
                        <label
                            v-for="(c, r) in rarityOptions"
                            :key="r"
                            class="flex items-center gap-2 cursor-pointer"
                        >
                            <input
                                type="radio"
                                :value="r"
                                v-model="form.rarity"
                                class="h-4 w-4 text-yellow-500 focus:ring-2 focus:ring-yellow-400"
                            />
                            <span :class="c">{{ r }}★</span>
                        </label>
                        <p
                            v-if="form.errors.rarity"
                            class="text-red-600 text-sm mt-1"
                        >
                            {{ form.errors.rarity }}
                        </p>
                    </div>
                </fieldset>

                <!-- Passive -->
                <div>
                    <label for="passive" class="block font-semibold mb-2 text-gray-700">
                        Passive
                    </label>
                    <textarea
                        id="passive"
                        v-model="form.passive"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition resize-none"
                        rows="3"
                        placeholder="Describe weapon passive"
                    ></textarea>
                    <p
                        v-if="form.errors.passive"
                        class="text-red-600 text-sm mt-1"
                    >
                        {{ form.errors.passive }}
                    </p>
                </div>

                <!-- Submit -->
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full px-4 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    Add Weapon
                </button>
            </form>
        </div>
    </AppLayout>
</template>

