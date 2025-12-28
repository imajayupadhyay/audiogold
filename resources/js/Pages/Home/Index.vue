<template>
    <Head title="AudioGold - Premium Professional Audio Equipment" />

    <MainLayout>
        <!-- Background slot -->
        <template #background>
            <AnimatedBackground />
        </template>

        <!-- Hero Section -->
        <HeroSection />

        <!-- About Section -->
        <AboutSection />

        <!-- Why Choose Section -->
        <WhyChooseSection />

        <!-- Dealer Section -->
        <DealerSection />

        <!-- Contact Section -->
        <ContactSection />
    </MainLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import AnimatedBackground from './Components/AnimatedBackground.vue';
import HeroSection from './Components/HeroSection.vue';
import AboutSection from './Components/AboutSection.vue';
import WhyChooseSection from './Components/WhyChooseSection.vue';
import DealerSection from './Components/DealerSection.vue';
import ContactSection from './Components/ContactSection.vue';
</script>
