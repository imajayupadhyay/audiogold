<template>
    <Head>
        <title>{{ categoryData.name }} - Professional Amplifiers | AudioGold</title>
        <meta name="description" :content="`Shop ${categoryData.name} at AudioGold. ${categoryData.description || 'High-quality professional audio amplifiers designed for superior performance.'} Browse our collection and get expert support.`" />
        <meta name="keywords" :content="`${categoryData.name}, AudioGold amplifiers, professional audio, sound equipment India`" />
    </Head>

    <MainLayout>
        <template #background>
            <AnimatedBackground />
        </template>

        <div class="relative pt-32 pb-20">
            <!-- Breadcrumb -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
                <div class="flex items-center space-x-2 text-sm">
                    <Link href="/products" class="text-gray-600 hover:text-audiogold-600 transition-colors duration-200">
                        Products
                    </Link>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                    <Link v-if="categoryData.parent" :href="`/products/${categoryData.parent.slug}`" class="text-gray-600 hover:text-audiogold-600 transition-colors duration-200">
                        {{ categoryData.parent.name }}
                    </Link>
                    <svg v-if="categoryData.parent" class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                    <span class="text-audiogold-600 font-medium">{{ categoryData.name }}</span>
                </div>
            </section>

            <!-- Hero Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="backdrop-blur-md bg-white/60 rounded-3xl p-12 shadow-xl border border-audiogold-200/50">
                    <div v-if="categoryData.icon" class="flex items-center justify-center mb-6">
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
                    <p v-if="categoryData.description" class="text-xl text-gray-600 text-center max-w-3xl mx-auto leading-relaxed">
                        {{ categoryData.description }}
                    </p>
                </div>
            </section>

            <!-- Products Grid -->
            <section v-if="products.length > 0" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">
                        Available Products
                        <span class="text-audiogold-600 ml-2">({{ products.length }})</span>
                    </h2>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                        </svg>
                        <span>{{ products.length }} Models</span>
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div v-for="product in products" :key="product.id"
                         class="backdrop-blur-md bg-white/70 rounded-2xl shadow-lg border border-audiogold-200/50 overflow-hidden group hover:shadow-2xl transition-all duration-500 hover:scale-105">
                        <!-- Product Image -->
                        <div class="relative h-56 bg-gradient-to-br from-gray-50 to-gray-100 overflow-hidden">
                            <img v-if="product.images && product.images.length > 0"
                                 :src="product.images[0]"
                                 :alt="product.name"
                                 class="w-full h-full object-contain p-4 group-hover:scale-110 transition-transform duration-500"
                            />
                            <div v-else class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
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
                                <Link :href="`/products/${categorySlug}/${product.slug}`" class="w-full py-2.5 px-4 bg-gradient-to-r from-audiogold-500 to-audiogold-600 text-white rounded-lg font-semibold hover:from-audiogold-600 hover:to-audiogold-700 transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center space-x-2">
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

            <!-- Empty State -->
            <section v-else class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="backdrop-blur-md bg-white/60 rounded-3xl p-12 shadow-xl border border-audiogold-200/50 text-center">
                    <svg class="w-20 h-20 mx-auto text-gray-400 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">No Products Available</h3>
                    <p class="text-gray-600 mb-6">We're currently updating our product catalog for this category. Please check back soon or contact us for more information.</p>
                    <a href="/contact" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-audiogold-500 to-audiogold-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-audiogold-500/50 transition-all duration-300 hover:scale-105">
                        Contact Us
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
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
                        <Link href="/contact"
                           class="inline-flex items-center justify-center px-8 py-4 bg-white text-audiogold-600 rounded-full font-semibold hover:bg-audiogold-50 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                            Contact Us
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </Link>
                        <Link href="/support"
                           class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-white text-white rounded-full font-semibold hover:bg-white hover:text-audiogold-600 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                            Get Support
                        </Link>
                    </div>
                </div>
            </section>
        </div>
    </MainLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import AnimatedBackground from '@/Pages/Home/Components/AnimatedBackground.vue';

defineProps({
    categorySlug: {
        type: String,
        required: true
    },
    categoryData: {
        type: Object,
        required: true
    },
    products: {
        type: Array,
        default: () => []
    }
});
</script>
