<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div
        class="w-full items-center flex justify-evenly p-2 fixed z-50 bg-blue-100 shadow"
    >
        <Link :href="route('home')" class="hover:bg-blue-200 p-2 rounded-lg">
            <img src="/genshinlogo.png" alt="Genshin Logo" />
        </Link>
        <Link
            :href="route('characters.index')"
            class="px-4 py-2 text-purple-800 rounded-lg hover:bg-blue-200 hover:scale-105 transition-transform"
        >
            Characters
        </Link>

        <Link
            :href="route('artifacts.index')"
            class="px-4 py-2 text-purple-800 rounded-lg hover:bg-blue-200 hover:scale-105 transition-transform"
        >
            Artifacts
        </Link>
        <Link
            :href="route('regions.index')"
            class="px-4 py-2 text-purple-800 rounded-lg hover:bg-blue-200 hover:scale-105 transition-transform"
        >
            Regions
        </Link>
    </div>
</template>
