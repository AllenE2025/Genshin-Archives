<script setup>
import NavBar from "@/Components/NavBar.vue";
</script>

<template>
    <div class="min-h-screen flex flex-col bg-gray-300">
        <!-- Navbar always shows -->
        <NavBar />

        <!-- Page content -->
        <main class="flex-1 p-4">
            <slot />
        </main>

        <!-- Footer -->
        <footer class="text-center p-2 bg-gray-200">2025</footer>
    </div>
</template>
