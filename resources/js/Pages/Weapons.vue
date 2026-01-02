<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({ weapons: Array });
</script>

<template>
    <AppLayout>
        <div class="max-w-3xl mx-auto mt-10 p-4">
            <div class="text-center mb-6">
                <h1 class="text-4xl font-bold mb-2">Weapons</h1>
            </div>
            <div class="flex justify-end mb-6 space-x-4">
                <Link
                    :href="route('weapons.create')"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition-all duration-300"
                    >Add New Weapon</Link
                >
                <Link
                    :href="route('home')"
                    class="px-4 py-2 bg-gray-400 text-white rounded shadow hover:bg-gray-500"
                    >Home</Link
                >
            </div>
            <p v-if="weapons.length === 0">No Weapons</p>
            <ul v-if="weapons.length > 0">
                <li v-for="weapon in props.weapons" >
                    {{ weapon.name }}
                    {{ weapon.weapon_type }}
                    {{ weapon.base_attack }}
                    {{ weapon.sub_attack }}
                    {{ weapon.rarity }}
                    {{ weapon.passive }}
                </li>
            </ul>
        </div>
    </AppLayout>
</template>
