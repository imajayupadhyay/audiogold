<template>
    <Head>
        <title>AudioGold - Premium Professional Audio Amplifiers in India</title>
        <meta name="description" content="AudioGold is India's leading manufacturer of professional audio amplifiers. Explore our range of high-quality power amplifiers for events, studios, and venues. Get expert support and nationwide delivery." />
        <meta name="keywords" content="audio amplifiers, professional amplifiers, power amplifiers India, AudioGold, sound equipment, PA systems" />
    </Head>

    <MainLayout>
        <!-- Background slot -->
        <template #background>
            <AnimatedBackground />
        </template>

        <!-- Hero Section -->
        <HeroSection :slides="heroSlides" />

        <!-- About Section -->
        <AboutSection :settings="homepageSettings" />

        <!-- Why Choose Section -->
        <WhyChooseSection :settings="homepageSettings" />

        <!-- Dealer Section -->
        <DealerSection :settings="homepageSettings" />

        <!-- Contact Section -->
        <ContactSection :settings="homepageSettings" />
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

defineProps({
    heroSlides: {
        type: Array,
        default: () => [],
    },
    homepageSettings: {
        type: Object,
        required: true,
    },
});
</script>
