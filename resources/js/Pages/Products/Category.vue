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
                         class="backdrop-blur-md bg-white/70 rounded-2xl shadow-lg border border-audiogold-200/50 overflow-hidden group hover:shadow-2xl transition-all duration-500 hover:scale-105">
                        <!-- Product Image -->
                        <div class="relative h-56 bg-gradient-to-br from-gray-50 to-gray-100 overflow-hidden">
                            <img :src="product.image" :alt="product.name" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
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
                                <Link :href="`/products/${category}/${product.slug}`" class="w-full py-2.5 px-4 bg-gradient-to-r from-audiogold-500 to-audiogold-600 text-white rounded-lg font-semibold hover:from-audiogold-600 hover:to-audiogold-700 transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center space-x-2">
                                    <span>View Details</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </Link>
                                <a :href="`https://wa.me/917011651721?text=Hi, I'm interested in ${product.name}. Can you provide more details?`" target="_blank" rel="noopener noreferrer" class="w-full py-2.5 px-4 bg-white border-2 border-audiogold-200 text-audiogold-600 rounded-lg font-semibold hover:bg-audiogold-50 hover:border-audiogold-300 transition-all duration-300 flex items-center justify-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    <span>Inquiry</span>
                                </a>
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
import { Link } from '@inertiajs/vue3';
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
            { name: 'AG-1212 ULTRA', slug: 'ag-1212-ultra', image: 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=600&h=400&fit=crop' },
            { name: 'AG-1616 ULTRA', slug: 'ag-1616-ultra', image: 'https://images.unsplash.com/photo-1519558260268-cde7e03a0152?w=600&h=400&fit=crop' },
            { name: 'AG-BA-500 Booster Amplifier', slug: 'ag-ba-500', image: 'https://images.unsplash.com/photo-1614113489855-66422d8ca22a?w=600&h=400&fit=crop' },
            { name: 'BT-1600', slug: 'bt-1600', image: 'https://images.unsplash.com/photo-1487180144351-b8472da7d491?w=600&h=400&fit=crop' },
            { name: 'DJ-1600', slug: 'dj-1600', image: 'https://images.unsplash.com/photo-1593784991095-a205069470b6?w=600&h=400&fit=crop' },
            { name: 'PBT-501', slug: 'pbt-501', image: 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?w=600&h=400&fit=crop' },
            { name: 'PBT-501U', slug: 'pbt-501u', image: 'https://images.unsplash.com/photo-1598653222000-6b7b7a552625?w=600&h=400&fit=crop' },
            { name: 'PBT-502', slug: 'pbt-502', image: 'https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=600&h=400&fit=crop' },
            { name: 'PBT-502U', slug: 'pbt-502u', image: 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=600&h=400&fit=crop' },
            { name: 'PBT-503', slug: 'pbt-503', image: 'https://images.unsplash.com/photo-1519558260268-cde7e03a0152?w=600&h=400&fit=crop' },
            { name: 'PBT-701', slug: 'pbt-701', image: 'https://images.unsplash.com/photo-1614113489855-66422d8ca22a?w=600&h=400&fit=crop' },
            { name: 'PBT-701U', slug: 'pbt-701u', image: 'https://images.unsplash.com/photo-1487180144351-b8472da7d491?w=600&h=400&fit=crop' },
            { name: 'PBT-702', slug: 'pbt-702', image: 'https://images.unsplash.com/photo-1593784991095-a205069470b6?w=600&h=400&fit=crop' },
            { name: 'PBT-702U', slug: 'pbt-702u', image: 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?w=600&h=400&fit=crop' },
            { name: 'PBT-703', slug: 'pbt-703', image: 'https://images.unsplash.com/photo-1598653222000-6b7b7a552625?w=600&h=400&fit=crop' },
        ]
    },
    'mixer-amplifiers': {
        name: 'Mixer Amplifiers',
        description: 'Combine multiple audio sources with professional mixing capabilities and powerful output',
        icon: 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4',
        products: [
            { name: 'AG-250FX', slug: 'ag-250fx', image: 'https://images.unsplash.com/photo-1593784991095-a205069470b6?w=600&h=400&fit=crop' },
            { name: 'AG-350FX', slug: 'ag-350fx', image: 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?w=600&h=400&fit=crop' },
            { name: 'AG-MA-1000 Mixer Amplifier', slug: 'ag-ma-1000', image: 'https://images.unsplash.com/photo-1598653222000-6b7b7a552625?w=600&h=400&fit=crop' },
            { name: 'SSA-250DP ECHO', slug: 'ssa-250dp-echo', image: 'https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=600&h=400&fit=crop' },
            { name: 'SSA-250DP WITHOUT ECHO', slug: 'ssa-250dp-without-echo', image: 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=600&h=400&fit=crop' },
            { name: 'SSA-350DP ECHO', slug: 'ssa-350dp-echo', image: 'https://images.unsplash.com/photo-1519558260268-cde7e03a0152?w=600&h=400&fit=crop' },
            { name: 'SSA-350DP WITHOUT ECHO', slug: 'ssa-350dp-without-echo', image: 'https://images.unsplash.com/photo-1614113489855-66422d8ca22a?w=600&h=400&fit=crop' },
            { name: 'SSA-5000DP', slug: 'ssa-5000dp', image: 'https://images.unsplash.com/photo-1487180144351-b8472da7d491?w=600&h=400&fit=crop' },
            { name: 'SSB-120DP', slug: 'ssb-120dp', image: 'https://images.unsplash.com/photo-1593784991095-a205069470b6?w=600&h=400&fit=crop' },
            { name: 'SSB-150DP', slug: 'ssb-150dp', image: 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?w=600&h=400&fit=crop' },
            { name: 'TZA-5000DP', slug: 'tza-5000dp', image: 'https://images.unsplash.com/photo-1598653222000-6b7b7a552625?w=600&h=400&fit=crop' },
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
            { name: 'AB-2200', slug: 'ab-2200', image: 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=600&h=400&fit=crop' },
            { name: 'AB-3200', slug: 'ab-3200', image: 'https://images.unsplash.com/photo-1519558260268-cde7e03a0152?w=600&h=400&fit=crop' },
            { name: 'AB-4200', slug: 'ab-4200', image: 'https://images.unsplash.com/photo-1614113489855-66422d8ca22a?w=600&h=400&fit=crop' },
            { name: 'AB-5200', slug: 'ab-5200', image: 'https://images.unsplash.com/photo-1487180144351-b8472da7d491?w=600&h=400&fit=crop' },
            { name: 'AB-6000', slug: 'ab-6000', image: 'https://images.unsplash.com/photo-1593784991095-a205069470b6?w=600&h=400&fit=crop' },
            { name: 'AB2-2200', slug: 'ab2-2200', image: 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?w=600&h=400&fit=crop' },
            { name: 'AB2-3600', slug: 'ab2-3600', image: 'https://images.unsplash.com/photo-1598653222000-6b7b7a552625?w=600&h=400&fit=crop' },
            { name: 'AB2-4200', slug: 'ab2-4200', image: 'https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=600&h=400&fit=crop' },
            { name: 'AB2-5200', slug: 'ab2-5200', image: 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=600&h=400&fit=crop' },
            { name: 'AB2-6000', slug: 'ab2-6000', image: 'https://images.unsplash.com/photo-1519558260268-cde7e03a0152?w=600&h=400&fit=crop' },
            { name: 'ABX-2200i', slug: 'abx-2200i', image: 'https://images.unsplash.com/photo-1614113489855-66422d8ca22a?w=600&h=400&fit=crop' },
            { name: 'ABX-3600i', slug: 'abx-3600i', image: 'https://images.unsplash.com/photo-1487180144351-b8472da7d491?w=600&h=400&fit=crop' },
            { name: 'ABX-4200i', slug: 'abx-4200i', image: 'https://images.unsplash.com/photo-1593784991095-a205069470b6?w=600&h=400&fit=crop' },
            { name: 'ABX-5200i', slug: 'abx-5200i', image: 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?w=600&h=400&fit=crop' },
            { name: 'ABX-6000i', slug: 'abx-6000i', image: 'https://images.unsplash.com/photo-1598653222000-6b7b7a552625?w=600&h=400&fit=crop' },
            { name: 'BJX-2K2', slug: 'bjx-2k2', image: 'https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=600&h=400&fit=crop' },
            { name: 'BJX-3K2', slug: 'bjx-3k2', image: 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=600&h=400&fit=crop' },
            { name: 'BJX-4K2', slug: 'bjx-4k2', image: 'https://images.unsplash.com/photo-1519558260268-cde7e03a0152?w=600&h=400&fit=crop' },
            { name: 'DJ1-2K2', slug: 'dj1-2k2', image: 'https://images.unsplash.com/photo-1614113489855-66422d8ca22a?w=600&h=400&fit=crop' },
            { name: 'DJ1-3K2', slug: 'dj1-3k2', image: 'https://images.unsplash.com/photo-1487180144351-b8472da7d491?w=600&h=400&fit=crop' },
            { name: 'DJ1-4K2', slug: 'dj1-4k2', image: 'https://images.unsplash.com/photo-1593784991095-a205069470b6?w=600&h=400&fit=crop' },
            { name: 'DJ2-2K2', slug: 'dj2-2k2', image: 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?w=600&h=400&fit=crop' },
            { name: 'DJ2-3K2', slug: 'dj2-3k2', image: 'https://images.unsplash.com/photo-1598653222000-6b7b7a552625?w=600&h=400&fit=crop' },
            { name: 'DJ2-4K2', slug: 'dj2-4k2', image: 'https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=600&h=400&fit=crop' },
            { name: 'DJ2-5K2', slug: 'dj2-5k2', image: 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=600&h=400&fit=crop' },
            { name: 'DJ2-6000', slug: 'dj2-6000', image: 'https://images.unsplash.com/photo-1519558260268-cde7e03a0152?w=600&h=400&fit=crop' },
            { name: 'DJ3-2K2', slug: 'dj3-2k2', image: 'https://images.unsplash.com/photo-1614113489855-66422d8ca22a?w=600&h=400&fit=crop' },
            { name: 'DJ3-3K2', slug: 'dj3-3k2', image: 'https://images.unsplash.com/photo-1487180144351-b8472da7d491?w=600&h=400&fit=crop' },
            { name: 'DJ3-4K2', slug: 'dj3-4k2', image: 'https://images.unsplash.com/photo-1593784991095-a205069470b6?w=600&h=400&fit=crop' },
            { name: 'DJ4-2K2', slug: 'dj4-2k2', image: 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?w=600&h=400&fit=crop' },
            { name: 'DJ4-3K2', slug: 'dj4-3k2', image: 'https://images.unsplash.com/photo-1598653222000-6b7b7a552625?w=600&h=400&fit=crop' },
            { name: 'DJ4-4K2', slug: 'dj4-4k2', image: 'https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=600&h=400&fit=crop' },
            { name: 'DX-2500', slug: 'dx-2500', image: 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=600&h=400&fit=crop' },
            { name: 'DX-3500', slug: 'dx-3500', image: 'https://images.unsplash.com/photo-1519558260268-cde7e03a0152?w=600&h=400&fit=crop' },
            { name: 'DX-4200', slug: 'dx-4200', image: 'https://images.unsplash.com/photo-1614113489855-66422d8ca22a?w=600&h=400&fit=crop' },
            { name: 'DX-5200', slug: 'dx-5200', image: 'https://images.unsplash.com/photo-1487180144351-b8472da7d491?w=600&h=400&fit=crop' },
            { name: 'DX-6000', slug: 'dx-6000', image: 'https://images.unsplash.com/photo-1593784991095-a205069470b6?w=600&h=400&fit=crop' },
            { name: 'HD-2200', slug: 'hd-2200', image: 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?w=600&h=400&fit=crop' },
            { name: 'HD-3200', slug: 'hd-3200', image: 'https://images.unsplash.com/photo-1598653222000-6b7b7a552625?w=600&h=400&fit=crop' },
            { name: 'HD-4200', slug: 'hd-4200', image: 'https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=600&h=400&fit=crop' },
            { name: 'RX-2000', slug: 'rx-2000', image: 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=600&h=400&fit=crop' },
            { name: 'RX-3500', slug: 'rx-3500', image: 'https://images.unsplash.com/photo-1519558260268-cde7e03a0152?w=600&h=400&fit=crop' },
            { name: 'RX-4000', slug: 'rx-4000', image: 'https://images.unsplash.com/photo-1614113489855-66422d8ca22a?w=600&h=400&fit=crop' },
            { name: 'RX-5000', slug: 'rx-5000', image: 'https://images.unsplash.com/photo-1487180144351-b8472da7d491?w=600&h=400&fit=crop' },
            { name: 'RX-6000', slug: 'rx-6000', image: 'https://images.unsplash.com/photo-1593784991095-a205069470b6?w=600&h=400&fit=crop' },
            { name: 'XT-2200', slug: 'xt-2200', image: 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?w=600&h=400&fit=crop' },
            { name: 'XT-3200', slug: 'xt-3200', image: 'https://images.unsplash.com/photo-1598653222000-6b7b7a552625?w=600&h=400&fit=crop' },
            { name: 'XT-4200', slug: 'xt-4200', image: 'https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=600&h=400&fit=crop' },
        ]
    },
    'class-h': {
        name: 'Class H Amplifiers',
        description: 'Improve efficiency using dynamic power supply adjustment for reduced power consumption and heat generation',
        icon: 'M13 10V3L4 14h7v7l9-11h-7z',
        products: [
            { name: 'MT-1201', slug: 'mt-1201', image: 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=600&h=400&fit=crop' },
            { name: 'MT-1601', slug: 'mt-1601', image: 'https://images.unsplash.com/photo-1519558260268-cde7e03a0152?w=600&h=400&fit=crop' },
            { name: 'MT-1801', slug: 'mt-1801', image: 'https://images.unsplash.com/photo-1614113489855-66422d8ca22a?w=600&h=400&fit=crop' },
            { name: 'GALAXY 6400', slug: 'galaxy-6400', image: 'https://images.unsplash.com/photo-1487180144351-b8472da7d491?w=600&h=400&fit=crop' },
            { name: 'GALAXY 7400', slug: 'galaxy-7400', image: 'https://images.unsplash.com/photo-1593784991095-a205069470b6?w=600&h=400&fit=crop' },
            { name: 'COOL 9.0', slug: 'cool-9-0', image: 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?w=600&h=400&fit=crop' },
        ]
    }
};

const categoryData = categories[props.category] || categories['booster-amplifiers'];
</script>
