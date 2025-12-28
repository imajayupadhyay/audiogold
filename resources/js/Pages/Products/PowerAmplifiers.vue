<template>
    <MainLayout>
        <template #background>
            <AnimatedBackground />
        </template>

        <div class="relative pt-32 pb-20">
            <!-- Breadcrumb -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
                <div class="flex items-center space-x-2 text-sm">
                    <a href="/products" class="text-gray-600 hover:text-audiogold-600 transition-colors duration-200">
                        Products
                    </a>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                    <span class="text-audiogold-600 font-medium">Power Amplifiers</span>
                </div>
            </section>

            <!-- Hero Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="backdrop-blur-md bg-white/60 rounded-3xl p-12 shadow-xl border border-audiogold-200/50">
                    <div class="flex items-center justify-center mb-6">
                        <div class="w-20 h-20 rounded-full bg-gradient-to-br from-audiogold-500 to-audiogold-700 flex items-center justify-center shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-center mb-6">
                        <span class="block bg-gradient-to-r from-audiogold-600 via-audiogold-700 to-audiogold-800 bg-clip-text text-transparent">
                            Power Amplifiers
                        </span>
                    </h1>
                    <p class="text-xl text-gray-600 text-center max-w-3xl mx-auto leading-relaxed">
                        Deliver strong output to speakers efficiently with advanced thermal management and exceptional performance
                    </p>
                </div>
            </section>

            <!-- Subcategories Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Choose Your Class</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        Select the amplifier class that best fits your audio requirements
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                    <a v-for="(subcategory, index) in subcategories" :key="index"
                       :href="subcategory.link"
                       class="backdrop-blur-md bg-white/60 rounded-3xl shadow-xl border border-audiogold-200/50 overflow-hidden group hover:shadow-2xl transition-all duration-500 hover:scale-105 cursor-pointer">
                        <!-- Subcategory Image Container -->
                        <div class="relative h-64 bg-gradient-to-br from-audiogold-50 to-audiogold-100 overflow-hidden">
                            <div class="absolute inset-0 flex items-center justify-center bg-white">
                                <div class="text-center p-8">
                                    <div class="w-32 h-32 mx-auto mb-4 rounded-full bg-gradient-to-br from-audiogold-400 to-audiogold-600 flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
                                        <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path :d="subcategory.icon"/>
                                        </svg>
                                    </div>
                                    <div class="text-sm text-gray-400 font-medium">Product Image</div>
                                </div>
                            </div>
                            <!-- Gradient overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>

                        <!-- Subcategory Content -->
                        <div class="p-8">
                            <div class="mb-4">
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ subcategory.name }}</h3>
                                <span class="inline-block px-3 py-1 bg-audiogold-100 text-audiogold-700 rounded-full text-sm font-semibold">
                                    {{ subcategory.count }} Models
                                </span>
                            </div>
                            <p class="text-gray-600 leading-relaxed mb-6">{{ subcategory.description }}</p>

                            <!-- Features -->
                            <div class="space-y-3 mb-6">
                                <div v-for="(feature, fIndex) in subcategory.features" :key="fIndex"
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
                                <span>View {{ subcategory.name }}</span>
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

            <!-- Info Banner -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="backdrop-blur-md bg-gradient-to-br from-audiogold-500 to-audiogold-700 rounded-3xl p-12 shadow-2xl border border-audiogold-300">
                    <h2 class="text-3xl font-bold text-white mb-6 text-center">Understanding Amplifier Classes</h2>
                    <div class="grid md:grid-cols-2 gap-8 text-white">
                        <div class="backdrop-blur-sm bg-white/10 rounded-2xl p-6">
                            <h3 class="text-xl font-bold mb-3">Class AB Amplifiers</h3>
                            <p class="text-audiogold-100 leading-relaxed">
                                Class AB amplifiers strike a perfect balance between sound quality and efficiency.
                                They combine the high fidelity of Class A with improved efficiency, making them ideal
                                for professional audio applications where both performance and power consumption matter.
                            </p>
                        </div>
                        <div class="backdrop-blur-sm bg-white/10 rounded-2xl p-6">
                            <h3 class="text-xl font-bold mb-3">Class H Amplifiers</h3>
                            <p class="text-audiogold-100 leading-relaxed">
                                Class H amplifiers use dynamic power supply adjustment to improve efficiency significantly.
                                By varying the supply voltage according to the signal level, they reduce power waste and
                                heat generation while maintaining excellent audio performance.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="backdrop-blur-md bg-gradient-to-r from-audiogold-600 to-audiogold-800 rounded-3xl p-12 text-center shadow-2xl">
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">Need Expert Advice?</h2>
                    <p class="text-audiogold-100 text-xl mb-8 max-w-2xl mx-auto">
                        Not sure which amplifier class is right for you? Our team of audio experts can help you choose the perfect solution.
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

const subcategories = [
    {
        name: 'Class AB',
        description: 'Class AB amplifiers offer high fidelity but low efficiency',
        icon: 'M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z',
        link: '/products/power-amplifiers/class-ab',
        count: 45,
        features: [
            'High fidelity audio reproduction',
            'Professional-grade performance',
            'Balanced sound and efficiency',
            'Minimal crossover distortion',
            'Reliable and proven technology'
        ]
    },
    {
        name: 'Class H',
        description: 'Improve efficiency using dynamic power supply adjustment',
        icon: 'M13 10V3L4 14h7v7l9-11h-7z',
        link: '/products/power-amplifiers/class-h',
        count: 6,
        features: [
            'Superior efficiency',
            'Dynamic power supply rails',
            'Reduced heat generation',
            'Lower power consumption',
            'Advanced power management'
        ]
    }
];
</script>
