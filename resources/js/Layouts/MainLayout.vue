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
        <Footer :settings="footerSettings" />
    </div>
</template>

<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import Navigation from '@/Components/Navigation.vue';
import Footer from '@/Components/Footer.vue';

const page = usePage();
const footerSettings = computed(() => page.props.footerSettings || {});
</script>
