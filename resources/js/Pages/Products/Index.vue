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
                        Premium Audio Solutions
                    </div>
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6">
                        <span class="block text-gray-800 mb-2">Our</span>
                        <span class="block bg-gradient-to-r from-audiogold-600 via-audiogold-700 to-audiogold-800 bg-clip-text text-transparent">
                            Product Range
                        </span>
                    </h1>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        Explore our comprehensive collection of professional-grade amplifiers,
                        engineered to deliver exceptional performance for every audio need.
                    </p>
                </div>
            </section>

            <!-- Categories Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="grid md:grid-cols-3 gap-8">
                    <a v-for="(category, index) in categories" :key="index"
                       :href="category.link"
                       class="backdrop-blur-md bg-white/60 rounded-3xl shadow-xl border border-audiogold-200/50 overflow-hidden group hover:shadow-2xl transition-all duration-500 hover:scale-105 cursor-pointer">
                        <!-- Category Image Container -->
                        <div class="relative h-64 bg-gradient-to-br from-audiogold-50 to-audiogold-100 overflow-hidden">
                            <!-- Placeholder for real amplifier image -->
                            <div class="absolute inset-0 flex items-center justify-center bg-white">
                                <!-- This will be replaced with actual image -->
                                <div class="text-center p-8">
                                    <div class="w-32 h-32 mx-auto mb-4 rounded-full bg-gradient-to-br from-audiogold-400 to-audiogold-600 flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
                                        <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path :d="category.icon"/>
                                        </svg>
                                    </div>
                                    <div class="text-sm text-gray-400 font-medium">Product Image</div>
                                </div>
                                <!-- Uncomment below when you have real images -->
                                <!-- <img :src="category.image" :alt="category.name" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" /> -->
                            </div>
                            <!-- Gradient overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>

                        <!-- Category Content -->
                        <div class="p-8">
                            <div class="mb-4">
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ category.name }}</h3>
                            </div>
                            <p class="text-gray-600 leading-relaxed mb-6">{{ category.description }}</p>

                            <!-- Features -->
                            <div class="space-y-3 mb-6">
                                <div v-for="(feature, fIndex) in category.features" :key="fIndex"
                                     class="flex items-start space-x-2 group/feature">
                                    <div class="w-5 h-5 rounded-full bg-audiogold-500 flex items-center justify-center flex-shrink-0 mt-0.5 group-hover/feature:scale-125 transition-transform duration-300">
                                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <span class="text-sm text-gray-700">{{ feature }}</span>
                                </div>
                            </div>

                            <!-- CTA Button -->
                            <div class="w-full py-3 px-6 bg-gradient-to-r from-audiogold-500 to-audiogold-600 text-white rounded-xl font-semibold hover:from-audiogold-600 hover:to-audiogold-700 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center space-x-2 group/btn">
                                <span>Explore {{ category.name }}</span>
                                <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Hover Border Effect -->
                        <div class="absolute inset-0 rounded-3xl border-2 border-audiogold-400 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                    </a>
                </div>
            </section>

            <!-- Features Grid -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="text-center mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Why Choose AudioGold</h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        Industry-leading features across all our product lines
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div v-for="(feature, index) in productFeatures" :key="index"
                         class="backdrop-blur-md bg-white/60 rounded-2xl p-6 shadow-lg border border-audiogold-200/50 hover:shadow-xl transition-all duration-300 hover:scale-105 group">
                        <div class="w-14 h-14 bg-gradient-to-br from-audiogold-500 to-audiogold-700 rounded-xl flex items-center justify-center mb-4 shadow-lg group-hover:rotate-12 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path :d="feature.icon"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">{{ feature.title }}</h3>
                        <p class="text-sm text-gray-600">{{ feature.description }}</p>
                    </div>
                </div>
            </section>

            <!-- Specifications Banner -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="backdrop-blur-md bg-gradient-to-br from-audiogold-500 to-audiogold-700 rounded-3xl p-12 shadow-2xl border border-audiogold-300">
                    <div class="grid md:grid-cols-4 gap-8">
                        <div v-for="(spec, index) in specifications" :key="index"
                             class="text-center group cursor-pointer">
                            <div class="text-5xl md:text-6xl font-bold text-white mb-2 group-hover:scale-110 transition-transform duration-300">
                                {{ spec.value }}
                            </div>
                            <div class="text-audiogold-100 text-lg font-semibold mb-1">{{ spec.label }}</div>
                            <div class="text-audiogold-200 text-sm">{{ spec.detail }}</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Technical Excellence Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="backdrop-blur-md bg-white/60 rounded-3xl p-12 shadow-xl border border-audiogold-200/50">
                    <div class="grid md:grid-cols-2 gap-12 items-center">
                        <div>
                            <h2 class="text-4xl font-bold text-gray-800 mb-6">
                                <span class="block text-2xl text-audiogold-600 font-semibold mb-2">Technical Excellence</span>
                                Engineered for Perfection
                            </h2>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                Every AudioGold amplifier is meticulously crafted using premium components
                                and cutting-edge technology. Our commitment to excellence ensures you receive
                                a product that exceeds expectations in both performance and reliability.
                            </p>
                            <div class="space-y-4">
                                <div v-for="(tech, index) in technicalPoints" :key="index"
                                     class="flex items-start space-x-3 group">
                                    <div class="w-6 h-6 rounded-full bg-audiogold-500 flex items-center justify-center flex-shrink-0 mt-1 group-hover:scale-125 transition-transform duration-300">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800">{{ tech.title }}</h4>
                                        <p class="text-sm text-gray-600">{{ tech.description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div v-for="(badge, index) in badges" :key="index"
                                 class="backdrop-blur-md bg-gradient-to-br from-audiogold-100 to-audiogold-200 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 text-center">
                                <svg class="w-12 h-12 text-audiogold-600 mx-auto mb-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path :d="badge.icon"/>
                                </svg>
                                <div class="text-sm font-bold text-audiogold-700">{{ badge.text }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="backdrop-blur-md bg-gradient-to-r from-audiogold-600 to-audiogold-800 rounded-3xl p-12 text-center shadow-2xl">
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">Need Help Choosing?</h2>
                    <p class="text-audiogold-100 text-xl mb-8 max-w-2xl mx-auto">
                        Our expert team is here to help you find the perfect amplifier for your specific needs.
                        Get personalized recommendations and technical support.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/contact"
                           class="inline-flex items-center justify-center px-8 py-4 bg-white text-audiogold-600 rounded-full font-semibold hover:bg-audiogold-50 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                            Contact Our Team
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a href="/support"
                           class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-white text-white rounded-full font-semibold hover:bg-white hover:text-audiogold-600 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                            View Support Resources
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

const categories = [
    {
        name: 'Booster Amplifiers',
        description: 'High-gain amplification for weak signals',
        icon: 'M13 10V3L4 14h7v7l9-11h-7z',
        link: '/products/booster-amplifiers',
        features: [
            'Ultra-low noise floor',
            'Wide frequency response',
            'Adjustable gain control',
            'Signal integrity preservation',
            'Compact form factor'
        ]
    },
    {
        name: 'Mixer Amplifiers',
        description: 'Combine audio sources and output together',
        icon: 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4',
        link: '/products/mixer-amplifiers',
        features: [
            'Multiple input channels',
            'Independent volume controls',
            'Built-in EQ per channel',
            'Zone control capability',
            'Professional mixing console'
        ]
    },
    {
        name: 'Power Amplifiers',
        description: 'Deliver strong output to speakers efficiently',
        icon: 'M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z',
        link: '/products/power-amplifiers',
        features: [
            'High wattage output',
            'Exceptional efficiency',
            'Advanced thermal management',
            'Bridge-mono capability',
            'Professional-grade components'
        ]
    }
];

const productFeatures = [
    {
        title: 'Premium Build',
        description: 'Military-grade components for maximum durability',
        icon: 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'
    },
    {
        title: '5-Year Warranty',
        description: 'Comprehensive coverage on all products',
        icon: 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'
    },
    {
        title: 'Expert Support',
        description: '24/7 technical assistance from audio professionals',
        icon: 'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z'
    },
    {
        title: 'Global Shipping',
        description: 'Fast and secure delivery worldwide',
        icon: 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z'
    },
    {
        title: 'Energy Efficient',
        description: 'Class-D technology for reduced power consumption',
        icon: 'M13 10V3L4 14h7v7l9-11h-7z'
    },
    {
        title: 'Certified Quality',
        description: 'CE, FCC, and RoHS compliant',
        icon: 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'
    },
    {
        title: 'Easy Integration',
        description: 'Compatible with all major audio systems',
        icon: 'M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z'
    },
    {
        title: 'Upgradable',
        description: 'Modular design for future enhancements',
        icon: 'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15'
    }
];

const specifications = [
    { value: '120dB', label: 'SNR', detail: 'Signal-to-Noise Ratio' },
    { value: '0.01%', label: 'THD', detail: 'Total Harmonic Distortion' },
    { value: '20Hz-20kHz', label: 'Frequency Range', detail: 'Full Spectrum' },
    { value: '95%', label: 'Efficiency', detail: 'Class-D Technology' }
];

const technicalPoints = [
    {
        title: 'Advanced DSP',
        description: 'Digital signal processing for pristine audio clarity'
    },
    {
        title: 'Thermal Protection',
        description: 'Intelligent cooling system prevents overheating'
    },
    {
        title: 'Balanced Inputs',
        description: 'XLR and TRS connections for professional setups'
    },
    {
        title: 'Modular Architecture',
        description: 'Easily upgrade components as technology evolves'
    }
];

const badges = [
    {
        icon: 'M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z',
        text: 'Award Winning Design'
    },
    {
        icon: 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
        text: 'ISO 9001 Certified'
    },
    {
        icon: 'M13 10V3L4 14h7v7l9-11h-7z',
        text: 'Energy Star Rated'
    },
    {
        icon: 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
        text: 'Worldwide Shipping'
    }
];
</script>
