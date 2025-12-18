<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div class="w-full items-center flex justify-evenly p-4 bg-green">
        <img src="/genshinlogo.png" alt="Genshin Logo" />
        <Link
            :href="route('characters.index')"
            class="px-4 py-2 text-purple-800 rounded-lg hover:bg-blue-200 hover:scale-105 transition-transform"
        >
            Characters
        </Link>

        <button
            class="px-4 py-2 text-purple-800 rounded-lg hover:bg-blue-200 hover:scale-105 transition-transform"
        >
            Artifacts
        </button>
        <Link 
            :href="route('regions.index')"
            class="px-4 py-2 text-purple-800 rounded-lg hover:bg-blue-200 hover:scale-105 transition-transform"
        >
            Regions
        </Link>
    </div>
</template>
