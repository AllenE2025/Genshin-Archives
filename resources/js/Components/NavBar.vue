<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div class="w-full items-center flex justify-evenly p-4 bg-gray-200">
        <img src="/genshinlogo.png" alt="Genshin Logo" />
        <Link
            :href="route('characters.index')"
            class="px-4 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700"
        >
            Characters
        </Link>

        <button
            class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700"
        >
            Artifacts
        </button>
        <button
            class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700"
        >
            Regions
        </button>
    </div>
</template>
