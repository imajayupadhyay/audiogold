<template>
    <MainLayout>
        <template #background>
            <AnimatedBackground />
        </template>

        <div class="relative pt-32 pb-20">
            <!-- Hero Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="text-center">
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-audiogold-500 to-audiogold-600 text-white text-sm font-semibold mb-6 shadow-lg animate-float">
                        Est. 2010 - Crafting Excellence
                    </div>
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6">
                        <span class="block text-gray-800 mb-2">About</span>
                        <span class="block bg-gradient-to-r from-audiogold-600 via-audiogold-700 to-audiogold-800 bg-clip-text text-transparent">
                            AudioGold
                        </span>
                    </h1>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        Pioneering the future of audio excellence with innovative amplifier technology
                        and unwavering commitment to sound perfection.
                    </p>
                </div>
            </section>

            <!-- Story Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="backdrop-blur-md bg-white/60 rounded-3xl p-8 shadow-xl border border-audiogold-200/50 hover:shadow-2xl transition-all duration-500 hover:scale-105">
                        <div class="w-16 h-16 bg-gradient-to-br from-audiogold-500 to-audiogold-700 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Our Story</h2>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Founded in 2010 by a team of passionate audio engineers and music enthusiasts,
                            AudioGold was born from a simple yet powerful vision: to create amplifiers that
                            deliver uncompromising sound quality without the premium price tag.
                        </p>
                        <p class="text-gray-600 leading-relaxed">
                            What started in a small workshop in California has grown into a global brand
                            trusted by audiophiles, musicians, and recording studios worldwide. Our journey
                            has been driven by innovation, quality, and an unwavering commitment to excellence.
                        </p>
                    </div>

                    <div class="backdrop-blur-md bg-white/60 rounded-3xl p-8 shadow-xl border border-audiogold-200/50 hover:shadow-2xl transition-all duration-500 hover:scale-105">
                        <div class="w-16 h-16 bg-gradient-to-br from-audiogold-500 to-audiogold-700 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Our Mission</h2>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            To democratize premium audio experiences by engineering world-class amplifiers
                            that combine cutting-edge technology with accessible pricing.
                        </p>
                        <p class="text-gray-600 leading-relaxed">
                            We believe everyone deserves to experience music the way it was meant to be heard –
                            with clarity, depth, and emotion. Our mission extends beyond products; we're building
                            a community of audio enthusiasts who share our passion for sonic perfection.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Values Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="text-center mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Our Core Values</h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        The principles that guide everything we do
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <div v-for="(value, index) in values" :key="index"
                         class="backdrop-blur-md bg-white/60 rounded-3xl p-8 shadow-xl border border-audiogold-200/50 hover:shadow-2xl transition-all duration-500 hover:scale-105 group">
                        <div class="w-16 h-16 bg-gradient-to-br from-audiogold-500 to-audiogold-700 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:rotate-12 transition-transform duration-300">
                            <component :is="'svg'" class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path :d="value.icon"/>
                            </component>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ value.title }}</h3>
                        <p class="text-gray-600 leading-relaxed">{{ value.description }}</p>
                    </div>
                </div>
            </section>

            <!-- Stats Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="backdrop-blur-md bg-gradient-to-br from-audiogold-500 to-audiogold-700 rounded-3xl p-12 shadow-2xl border border-audiogold-300">
                    <div class="grid md:grid-cols-4 gap-8">
                        <div v-for="(stat, index) in stats" :key="index"
                             class="text-center group cursor-pointer">
                            <div class="text-5xl md:text-6xl font-bold text-white mb-2 group-hover:scale-110 transition-transform duration-300">
                                {{ stat.value }}
                            </div>
                            <div class="text-audiogold-100 text-lg font-semibold">{{ stat.label }}</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Team Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="text-center mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Meet Our Team</h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        The passionate people behind AudioGold
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <div v-for="(member, index) in team" :key="index"
                         class="backdrop-blur-md bg-white/60 rounded-3xl p-8 shadow-xl border border-audiogold-200/50 hover:shadow-2xl transition-all duration-500 hover:scale-105 group text-center">
                        <div class="w-32 h-32 mx-auto mb-6 rounded-full bg-gradient-to-br from-audiogold-400 to-audiogold-600 flex items-center justify-center text-white text-4xl font-bold shadow-lg group-hover:rotate-6 transition-transform duration-300">
                            {{ member.initials }}
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ member.name }}</h3>
                        <p class="text-audiogold-600 font-semibold mb-3">{{ member.role }}</p>
                        <p class="text-gray-600 leading-relaxed">{{ member.bio }}</p>
                    </div>
                </div>
            </section>

            <!-- Innovation Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="backdrop-blur-md bg-white/60 rounded-3xl p-12 shadow-xl border border-audiogold-200/50">
                    <div class="grid md:grid-cols-2 gap-12 items-center">
                        <div>
                            <h2 class="text-4xl font-bold text-gray-800 mb-6">Innovation at Our Core</h2>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                Our state-of-the-art research and development facility houses the latest in
                                audio testing equipment and simulation technology. We invest heavily in R&D
                                to ensure every product we release pushes the boundaries of what's possible
                                in audio amplification.
                            </p>
                            <div class="space-y-4">
                                <div v-for="(feature, index) in innovations" :key="index"
                                     class="flex items-start space-x-3 group">
                                    <div class="w-6 h-6 rounded-full bg-audiogold-500 flex items-center justify-center flex-shrink-0 mt-1 group-hover:scale-125 transition-transform duration-300">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <p class="text-gray-700">{{ feature }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="backdrop-blur-md bg-gradient-to-br from-audiogold-100 to-audiogold-200 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                                <div class="text-3xl font-bold text-audiogold-700 mb-2">50+</div>
                                <div class="text-audiogold-600 font-semibold">Patents Filed</div>
                            </div>
                            <div class="backdrop-blur-md bg-gradient-to-br from-audiogold-100 to-audiogold-200 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                                <div class="text-3xl font-bold text-audiogold-700 mb-2">24/7</div>
                                <div class="text-audiogold-600 font-semibold">Testing Lab</div>
                            </div>
                            <div class="backdrop-blur-md bg-gradient-to-br from-audiogold-100 to-audiogold-200 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                                <div class="text-3xl font-bold text-audiogold-700 mb-2">100%</div>
                                <div class="text-audiogold-600 font-semibold">Quality Tested</div>
                            </div>
                            <div class="backdrop-blur-md bg-gradient-to-br from-audiogold-100 to-audiogold-200 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                                <div class="text-3xl font-bold text-audiogold-700 mb-2">R&D</div>
                                <div class="text-audiogold-600 font-semibold">Excellence</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="backdrop-blur-md bg-gradient-to-r from-audiogold-600 to-audiogold-800 rounded-3xl p-12 text-center shadow-2xl">
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">Join the AudioGold Family</h2>
                    <p class="text-audiogold-100 text-xl mb-8 max-w-2xl mx-auto">
                        Experience the difference that passion, innovation, and quality craftsmanship can make
                        in your audio journey.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#products"
                           class="inline-flex items-center justify-center px-8 py-4 bg-white text-audiogold-600 rounded-full font-semibold hover:bg-audiogold-50 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                            Explore Products
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a href="/contact"
                           class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-white text-white rounded-full font-semibold hover:bg-white hover:text-audiogold-600 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                            Contact Us
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import AnimatedBackground from '@/Pages/Home/Components/AnimatedBackground.vue';

const values = [
    {
        title: 'Quality First',
        description: 'We never compromise on quality. Every component is carefully selected and rigorously tested to ensure peak performance and longevity.',
        icon: 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'
    },
    {
        title: 'Innovation',
        description: 'Continuous research and development drive us forward. We embrace new technologies while respecting timeless audio principles.',
        icon: 'M13 10V3L4 14h7v7l9-11h-7z'
    },
    {
        title: 'Customer Focus',
        description: 'Your satisfaction is our priority. We provide exceptional support, comprehensive warranties, and products designed with your needs in mind.',
        icon: 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'
    },
    {
        title: 'Sustainability',
        description: 'We are committed to environmental responsibility through eco-friendly manufacturing processes and recyclable materials.',
        icon: 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z'
    },
    {
        title: 'Transparency',
        description: 'Honest communication, clear pricing, and authentic reviews. We build trust through openness and integrity in everything we do.',
        icon: 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z'
    },
    {
        title: 'Community',
        description: 'Building a global community of audio enthusiasts who share knowledge, experiences, and passion for exceptional sound.',
        icon: 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'
    }
];

const stats = [
    { value: '15+', label: 'Years Experience' },
    { value: '50K+', label: 'Happy Customers' },
    { value: '100+', label: 'Countries Served' },
    { value: '98%', label: 'Satisfaction Rate' }
];

const team = [
    {
        name: 'Michael Chen',
        role: 'Founder & CEO',
        initials: 'MC',
        bio: 'Audio engineer with 20+ years of experience in amplifier design and a passion for sonic perfection.'
    },
    {
        name: 'Sarah Rodriguez',
        role: 'Chief Technology Officer',
        initials: 'SR',
        bio: 'Former NASA engineer bringing aerospace-grade precision to audio amplification technology.'
    },
    {
        name: 'David Thompson',
        role: 'Head of Customer Experience',
        initials: 'DT',
        bio: 'Dedicated to ensuring every customer receives world-class support and satisfaction.'
    }
];

const innovations = [
    'Proprietary Class-D amplification technology',
    'Advanced thermal management systems',
    'Digital signal processing optimization',
    'Eco-friendly power efficiency designs',
    'Modular architecture for easy upgrades'
];
</script>
