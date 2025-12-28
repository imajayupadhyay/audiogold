<template>
    <div class="min-h-screen relative">
        <!-- Animated Background -->
        <slot name="background">
            <!-- Default background - can be overridden by pages -->
        </slot>

        <!-- Navigation -->
        <Navigation />

        <!-- Main Content -->
        <main>
            <slot />
        </main>

        <!-- Footer -->
        <Footer />
    </div>
</template>

<script setup>
import Navigation from '@/Components/Navigation.vue';
import Footer from '@/Components/Footer.vue';
</script>
