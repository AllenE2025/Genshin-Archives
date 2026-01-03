<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router } from "@inertiajs/vue3";

const props = defineProps({ weapons: Array });

const deleteWeapon = (weapon) => {
    if (confirm(`Are you sure you want to delete ${weapon.name}?`)) {
        // Call Inertia to send DELETE request to your Laravel route
        router.delete(route("weapons.destroy", weapon.id));
    }
};
</script>

<template>
    <AppLayout>
        <div class="max-w-3xl mx-auto mt-10 p-4">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold mb-2">Weapons</h1>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end mb-6 space-x-4">
                <Link :href="route('weapons.create')"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition-all duration-300">
                    Add New Weapon
                </Link>
                <Link :href="route('home')" class="px-4 py-2 bg-gray-400 text-white rounded shadow hover:bg-gray-500">
                    Home
                </Link>
            </div>

            <!-- No Weapons Message -->
            <div v-if="weapons.length === 0" class="text-gray-500">
                No Weapons found.
            </div>
            <!-- Weapons List -->
            <!-- Region List -->
            <ul class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <li v-for="weapon in weapons" :key="weapon.id"
                    class="bg-white rounded-xl shadow-md p-5 flex flex-col justify-between hover:shadow-lg transition-shadow duration-200">
                    <!-- Weapon Info -->
                    <div class="space-y-1">
                        <h2 class="text-lg font-semibold text-gray-800">
                            {{ weapon.name }}
                        </h2>
                        <p class="text-gray-600">
                            <span class="font-medium">Type:</span>
                            {{ weapon.weapon_type }}
                        </p>
                        <p class="text-gray-600">
                            <span class="font-medium">Base Attack:</span>
                            {{ weapon.base_attack }}
                        </p>
                        <p class="text-gray-600">
                            <span class="font-medium">Sub Stat:</span>
                            {{ weapon.sub_stat_type }} {{ weapon.sub_stat }}
                        </p>
                        <p class="text-gray-600">
                            <span class="font-medium">Passive:</span>
                            {{ weapon.passive || "None" }}
                        </p>
                        <p class="text-gray-600">
                            <span class="font-medium">Rarity: </span>
                            <span :class="weapon.rarity === 5
                                ? 'text-yellow-600'
                                : weapon.rarity === 4
                                    ? 'text-purple-600'
                                    : 'text-blue-600'
                                ">
                                {{ weapon.rarity }}★
                            </span>
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-4 flex space-x-2">
                        <Link :href="route('weapons.edit', weapon.id)"
                            class="px-3 py-1 text-yellow-600 hover:bg-yellow-100 rounded-lg hover:scale-105 transition-transform">
                            Edit
                        </Link>
                        <button @click="deleteWeapon(weapon)"
                            class="px-3 py-1 text-red-600 hover:bg-red-100 rounded-lg hover:scale-105 transition-transform">
                            Delete
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </AppLayout>
</template>
