<template>
    <Head :title="`${product.name} - AudioGold`" />

    <MainLayout>
        <div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-gray-50">
            <!-- Breadcrumb -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-6">
                <nav class="flex items-center space-x-2 text-sm">
                    <a href="/" class="text-gray-500 hover:text-audiogold-600 transition-colors">Home</a>
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <a href="/products" class="text-gray-500 hover:text-audiogold-600 transition-colors">Products</a>
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <a :href="`/products/${product.category}`" class="text-gray-500 hover:text-audiogold-600 transition-colors capitalize">{{ product.categoryName }}</a>
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-audiogold-600 font-medium">{{ product.name }}</span>
                </nav>
            </div>

            <!-- Product Details -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
                <div class="grid lg:grid-cols-2 gap-12 mb-16">
                    <!-- Image Gallery -->
                    <div class="space-y-4">
                        <!-- Main Image -->
                        <div class="relative backdrop-blur-md bg-white/80 rounded-3xl p-8 shadow-2xl border border-white/50 overflow-hidden group">
                            <div class="aspect-square relative">
                                <img
                                    :src="selectedImage"
                                    :alt="product.name"
                                    class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-110"
                                />
                                <!-- Zoom Icon -->
                                <div class="absolute top-4 right-4 backdrop-blur-md bg-white/90 rounded-full p-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <svg class="w-5 h-5 text-audiogold-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Thumbnail Gallery -->
                        <div class="grid grid-cols-4 gap-4">
                            <button
                                v-for="(image, index) in product.images"
                                :key="index"
                                @click="selectedImage = image"
                                :class="[
                                    'backdrop-blur-md rounded-2xl p-4 border-2 transition-all duration-300 overflow-hidden group',
                                    selectedImage === image
                                        ? 'bg-audiogold-50 border-audiogold-500 shadow-lg'
                                        : 'bg-white/60 border-white/50 hover:border-audiogold-300 hover:shadow-md'
                                ]"
                            >
                                <img
                                    :src="image"
                                    :alt="`${product.name} - Image ${index + 1}`"
                                    class="w-full aspect-square object-contain transition-transform duration-300 group-hover:scale-110"
                                />
                            </button>
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="space-y-6">
                        <!-- Title & Badge -->
                        <div>
                            <div class="inline-block mb-4">
                                <span class="px-4 py-2 bg-gradient-to-r from-audiogold-100 to-audiogold-200 text-audiogold-700 text-sm font-semibold rounded-full border border-audiogold-300">
                                    {{ product.categoryName }}
                                </span>
                            </div>
                            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                                {{ product.name }}
                            </h1>
                            <p class="text-xl text-gray-600 leading-relaxed">
                                {{ product.description }}
                            </p>
                        </div>

                        <!-- Key Features -->
                        <div class="backdrop-blur-md bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-100">
                            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-audiogold-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                Key Features
                            </h3>
                            <ul class="space-y-3">
                                <li v-for="(feature, index) in product.features" :key="index" class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-audiogold-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700">{{ feature }}</span>
                                </li>
                            </ul>
                        </div>

                        <!-- WhatsApp CTA -->
                        <div class="space-y-3">
                            <a
                                :href="`https://wa.me/917011651721?text=Hi, I'm interested in ${product.name}. Can you provide more details?`"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="group flex items-center justify-center gap-3 w-full px-8 py-5 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-2xl font-bold text-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1"
                            >
                                <svg class="w-7 h-7 group-hover:scale-110 transition-transform duration-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                </svg>
                                Enquire on WhatsApp
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </a>
                            <p class="text-center text-sm text-gray-500">
                                Get instant response from our experts
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Specifications -->
                <div class="backdrop-blur-md bg-white/80 rounded-3xl p-8 md:p-12 shadow-2xl border border-white/50 mb-16">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-audiogold-500 to-audiogold-600 flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900">Technical Specifications</h2>
                            <p class="text-gray-600">Detailed product specifications</p>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <tbody class="divide-y divide-gray-200">
                                <tr
                                    v-for="(spec, index) in product.specifications"
                                    :key="index"
                                    class="hover:bg-gradient-to-r hover:from-audiogold-50 hover:to-transparent transition-colors duration-200"
                                >
                                    <td class="py-4 px-6 font-semibold text-gray-700 w-1/3">
                                        {{ spec.label }}
                                    </td>
                                    <td class="py-4 px-6 text-gray-600">
                                        {{ spec.value }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- FAQ Section -->
                <div class="backdrop-blur-md bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-8 md:p-12 shadow-2xl border border-purple-100">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900">Frequently Asked Questions</h2>
                            <p class="text-gray-600">Common questions about this product</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div
                            v-for="(faq, index) in product.faqs"
                            :key="index"
                            class="backdrop-blur-md bg-white/60 rounded-2xl border border-white/50 overflow-hidden"
                        >
                            <button
                                @click="toggleFaq(index)"
                                class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-white/80 transition-colors duration-200"
                            >
                                <span class="font-semibold text-gray-900 pr-4">{{ faq.question }}</span>
                                <svg
                                    :class="['w-5 h-5 text-audiogold-600 transition-transform duration-300 flex-shrink-0', openFaq === index ? 'rotate-180' : '']"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div
                                v-show="openFaq === index"
                                class="px-6 pb-5 text-gray-600 leading-relaxed"
                            >
                                {{ faq.answer }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sticky WhatsApp Button Mobile -->
                <div class="lg:hidden fixed bottom-6 left-0 right-0 px-4 z-40">
                    <a
                        :href="`https://wa.me/917011651721?text=Hi, I'm interested in ${product.name}. Can you provide more details?`"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="flex items-center justify-center gap-2 w-full px-6 py-4 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-full font-bold shadow-2xl hover:shadow-green-500/50 transition-all duration-300"
                    >
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        Enquire Now
                    </a>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

const props = defineProps({
    product: {
        type: Object,
        required: true
    }
});

const selectedImage = ref(props.product.images[0]);
const openFaq = ref(null);

const toggleFaq = (index) => {
    openFaq.value = openFaq.value === index ? null : index;
};
</script>

<style scoped>
/* Custom scrollbar for specs table */
.overflow-x-auto::-webkit-scrollbar {
    height: 8px;
}

.overflow-x-auto::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.overflow-x-auto::-webkit-scrollbar-thumb {
    background: linear-gradient(to right, #f59e0b, #d97706);
    border-radius: 10px;
}

.overflow-x-auto::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(to right, #d97706, #b45309);
}
</style>
