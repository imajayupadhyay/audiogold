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
                    <a v-if="isPowerAmplifierSubcategory" href="/products/power-amplifiers" class="text-gray-600 hover:text-audiogold-600 transition-colors duration-200">
                        Power Amplifiers
                    </a>
                    <svg v-if="isPowerAmplifierSubcategory" class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                    <span class="text-audiogold-600 font-medium">{{ categoryData.name }}</span>
                </div>
            </section>

            <!-- Hero Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="backdrop-blur-md bg-white/60 rounded-3xl p-12 shadow-xl border border-audiogold-200/50">
                    <div class="flex items-center justify-center mb-6">
                        <div class="w-20 h-20 rounded-full bg-gradient-to-br from-audiogold-500 to-audiogold-700 flex items-center justify-center shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path :d="categoryData.icon"/>
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-center mb-6">
                        <span class="block bg-gradient-to-r from-audiogold-600 via-audiogold-700 to-audiogold-800 bg-clip-text text-transparent">
                            {{ categoryData.name }}
                        </span>
                    </h1>
                    <p class="text-xl text-gray-600 text-center max-w-3xl mx-auto leading-relaxed">
                        {{ categoryData.description }}
                    </p>
                </div>
            </section>

            <!-- Products Grid -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">
                        Available Products
                        <span class="text-audiogold-600 ml-2">({{ categoryData.products.length }})</span>
                    </h2>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                        </svg>
                        <span>{{ categoryData.products.length }} Models</span>
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div v-for="(product, index) in categoryData.products" :key="index"
                         class="backdrop-blur-md bg-white/70 rounded-2xl shadow-lg border border-audiogold-200/50 overflow-hidden group hover:shadow-2xl transition-all duration-500 hover:scale-105 cursor-pointer">
                        <!-- Product Image -->
                        <div class="relative h-56 bg-gradient-to-br from-gray-50 to-gray-100 overflow-hidden">
                            <div class="absolute inset-0 flex items-center justify-center bg-white">
                                <!-- Placeholder for product image -->
                                <div class="text-center p-4">
                                    <div class="w-24 h-24 mx-auto mb-3 rounded-xl bg-gradient-to-br from-audiogold-400 to-audiogold-600 flex items-center justify-center group-hover:scale-110 group-hover:rotate-3 transition-all duration-500 shadow-lg">
                                        <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path :d="categoryData.icon"/>
                                        </svg>
                                    </div>
                                    <div class="text-xs text-gray-400 font-medium">Product Image</div>
                                </div>
                                <!-- Uncomment when you have real images -->
                                <!-- <img :src="product.image" :alt="product.name" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" /> -->
                            </div>
                            <!-- Gradient overlay on hover -->
                            <div class="absolute inset-0 bg-gradient-to-t from-audiogold-900/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                            <!-- Quick view badge -->
                            <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="bg-white/90 backdrop-blur-sm rounded-full p-2 shadow-lg">
                                    <svg class="w-5 h-5 text-audiogold-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-audiogold-600 transition-colors duration-300">
                                {{ product.name }}
                            </h3>
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-sm text-gray-500">{{ categoryData.name }}</span>
                                <div class="flex items-center space-x-1">
                                    <svg class="w-4 h-4 text-audiogold-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                    <span class="text-sm text-gray-600 font-medium">Premium</span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="space-y-2">
                                <button class="w-full py-2.5 px-4 bg-gradient-to-r from-audiogold-500 to-audiogold-600 text-white rounded-lg font-semibold hover:from-audiogold-600 hover:to-audiogold-700 transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center space-x-2">
                                    <span>View Details</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </button>
                                <button class="w-full py-2.5 px-4 bg-white border-2 border-audiogold-200 text-audiogold-600 rounded-lg font-semibold hover:bg-audiogold-50 hover:border-audiogold-300 transition-all duration-300 flex items-center justify-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    <span>Inquiry</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="backdrop-blur-md bg-gradient-to-r from-audiogold-600 to-audiogold-800 rounded-3xl p-12 text-center shadow-2xl">
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">Can't Find What You're Looking For?</h2>
                    <p class="text-audiogold-100 text-xl mb-8 max-w-2xl mx-auto">
                        Our team can help you find the perfect amplifier or create a custom solution for your needs.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/contact"
                           class="inline-flex items-center justify-center px-8 py-4 bg-white text-audiogold-600 rounded-full font-semibold hover:bg-audiogold-50 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                            Contact Us
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a href="/support"
                           class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-white text-white rounded-full font-semibold hover:bg-white hover:text-audiogold-600 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                            Get Support
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </MainLayout>
</template>

<script setup>
import { computed } from 'vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import AnimatedBackground from '@/Pages/Home/Components/AnimatedBackground.vue';

const props = defineProps({
    category: {
        type: String,
        required: true
    }
});

const isPowerAmplifierSubcategory = computed(() => {
    return props.category === 'class-ab' || props.category === 'class-h';
});

// Product data for each category
const categories = {
    'booster-amplifiers': {
        name: 'Booster Amplifiers',
        description: 'High-gain amplification for weak signals with ultra-low noise and exceptional signal integrity',
        icon: 'M13 10V3L4 14h7v7l9-11h-7z',
        products: [
            { name: 'AG-1212 ULTRA' },
            { name: 'AG-1616 ULTRA' },
            { name: 'BT-1600' },
            { name: 'DJ-1600' },
            { name: 'PBT-501' },
            { name: 'PBT-501U' },
            { name: 'PBT-502' },
            { name: 'PBT-502U' },
            { name: 'PBT-503' },
            { name: 'PBT-701' },
            { name: 'PBT-701U' },
            { name: 'PBT-702' },
            { name: 'PBT-702U' },
            { name: 'PBT-703' },
        ]
    },
    'mixer-amplifiers': {
        name: 'Mixer Amplifiers',
        description: 'Combine multiple audio sources with professional mixing capabilities and powerful output',
        icon: 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4',
        products: [
            { name: 'AG-250FX' },
            { name: 'AG-350FX' },
            { name: 'SSA-250DP ECHO' },
            { name: 'SSA-250DP WITHOUT ECHO' },
            { name: 'SSA-350DP ECHO' },
            { name: 'SSA-350DP WITHOUT ECHO' },
            { name: 'SSA-5000DP' },
            { name: 'SSB-120DP' },
            { name: 'SSB-150DP' },
            { name: 'TZA-5000DP' },
        ]
    },
    'power-amplifiers': {
        name: 'Power Amplifiers',
        description: 'Deliver strong output to speakers efficiently with advanced thermal management',
        icon: 'M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z',
        products: []
    },
    'class-ab': {
        name: 'Class AB Amplifiers',
        description: 'Class AB amplifiers offer high fidelity but low efficiency, striking the perfect balance between sound quality and power consumption',
        icon: 'M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z',
        products: [
            { name: 'AB-2200' },
            { name: 'AB-3200' },
            { name: 'AB-4200' },
            { name: 'AB-5200' },
            { name: 'AB-6000' },
            { name: 'AB2-2200' },
            { name: 'AB2-3600' },
            { name: 'AB2-4200' },
            { name: 'AB2-5200' },
            { name: 'AB2-6000' },
            { name: 'ABX-2200i' },
            { name: 'ABX-3600i' },
            { name: 'ABX-4200i' },
            { name: 'ABX-5200i' },
            { name: 'ABX-6000i' },
            { name: 'BJX-2K2' },
            { name: 'BJX-3K2' },
            { name: 'BJX-4K2' },
            { name: 'DJ1-2K2' },
            { name: 'DJ1-3K2' },
            { name: 'DJ1-4K2' },
            { name: 'DJ2-2K2' },
            { name: 'DJ2-3K2' },
            { name: 'DJ2-4K2' },
            { name: 'DJ2-5K2' },
            { name: 'DJ2-6000' },
            { name: 'DJ3-2K2' },
            { name: 'DJ3-3K2' },
            { name: 'DJ3-4K2' },
            { name: 'DJ4-2K2' },
            { name: 'DJ4-3K2' },
            { name: 'DJ4-4K2' },
            { name: 'DX-2500' },
            { name: 'DX-3500' },
            { name: 'DX-4200' },
            { name: 'DX-5200' },
            { name: 'DX-6000' },
            { name: 'HD-2200' },
            { name: 'HD-3200' },
            { name: 'HD-4200' },
            { name: 'RX-2000' },
            { name: 'RX-3500' },
            { name: 'RX-4000' },
            { name: 'RX-5000' },
            { name: 'RX-6000' },
            { name: 'XT-2200' },
            { name: 'XT-3200' },
            { name: 'XT-4200' },
        ]
    },
    'class-h': {
        name: 'Class H Amplifiers',
        description: 'Improve efficiency using dynamic power supply adjustment for reduced power consumption and heat generation',
        icon: 'M13 10V3L4 14h7v7l9-11h-7z',
        products: [
            { name: 'MT-1201' },
            { name: 'MT-1601' },
            { name: 'MT-1801' },
            { name: 'GALAXY 6400' },
            { name: 'GALAXY 7400' },
            { name: 'COOL 9.0' },
        ]
    }
};

const categoryData = categories[props.category] || categories['booster-amplifiers'];
</script>
