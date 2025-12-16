<script setup>
import NavBar from "@/Components/NavBar.vue";
</script>

<template>
    <div
        class="min-h-screen flex flex-col bg-gradient-to-b from-blue-100 to-white"
    >
        <!-- Navbar always shows -->
        <NavBar />

        <!-- Page content -->
        <main class="flex-1 p-4">
            <slot />
        </main>

        <!-- Footer -->
        <footer class="text-purple-800 text-center p-2 bg-white">2025</footer>
    </div>
</template>
