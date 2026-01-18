<template>
    <section id="about" class="py-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 mb-4 px-4 py-2 backdrop-blur-md bg-gradient-to-r from-audiogold-50 to-orange-50 rounded-full border border-audiogold-200">
                    <div class="w-2 h-2 rounded-full bg-audiogold-500 animate-pulse"></div>
                    <span class="text-sm font-semibold text-audiogold-700 tracking-wide uppercase">{{ settings.about_badge }}</span>
                </div>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                    <span class="block text-gray-900 mb-2">{{ settings.about_title_line1 }}</span>
                    <span class="block bg-gradient-to-r from-audiogold-600 via-audiogold-700 to-audiogold-800 bg-clip-text text-transparent">
                        {{ settings.about_title_line2 }}
                    </span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    {{ settings.about_subtitle }}
                </p>
            </div>

            <!-- Main Content -->
            <div class="grid lg:grid-cols-5 gap-8 mb-16">
                <!-- Left: Main Story Card (3 columns) -->
                <div class="lg:col-span-3">
                    <div class="h-full group relative backdrop-blur-md bg-white rounded-3xl p-10 shadow-xl border border-gray-200 hover:shadow-2xl transition-all duration-500 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-audiogold-50/50 via-transparent to-orange-50/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-br from-audiogold-400 to-orange-400 rounded-full blur-3xl opacity-10 group-hover:opacity-20 transition-opacity duration-500"></div>

                        <div class="relative space-y-8">
                            <!-- Mission Section -->
                            <div class="space-y-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-audiogold-500 to-audiogold-600 flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                        </svg>
                                    </div>
                                    <h3 class="text-3xl font-bold text-gray-900">{{ settings.about_mission_title }}</h3>
                                </div>
                                <p class="text-lg text-gray-600 leading-relaxed pl-1">
                                    {{ settings.about_mission_text }}
                                </p>
                            </div>

                            <!-- Divider -->
                            <div class="relative">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-200"></div>
                                </div>
                                <div class="relative flex justify-center">
                                    <span class="px-4 bg-white">
                                        <div class="w-8 h-1 rounded-full bg-gradient-to-r from-audiogold-400 to-orange-400"></div>
                                    </span>
                                </div>
                            </div>

                            <!-- Story Content -->
                            <div class="space-y-6">
                                <p class="text-lg text-gray-700 leading-relaxed" v-html="formattedParagraph1"></p>
                                <p class="text-lg text-gray-700 leading-relaxed">{{ settings.about_story_paragraph2 }}</p>

                                <!-- Key Points -->
                                <div class="grid sm:grid-cols-2 gap-4 pt-4">
                                    <div v-for="(point, index) in settings.about_key_points" :key="index" class="flex items-start gap-3">
                                        <div class="w-6 h-6 rounded-lg bg-audiogold-100 flex items-center justify-center flex-shrink-0 mt-1">
                                            <svg class="w-4 h-4 text-audiogold-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900">{{ point.title }}</p>
                                            <p class="text-sm text-gray-600">{{ point.description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CTA Link -->
                            <div class="pt-4">
                                <a href="/about" class="inline-flex items-center gap-2 text-audiogold-600 font-semibold hover:gap-3 transition-all duration-300 group/link">
                                    <span>Discover Our Complete Story</span>
                                    <svg class="w-5 h-5 group-hover/link:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Feature Cards Stack (2 columns) -->
                <div class="lg:col-span-2 space-y-6">
                    <div
                        v-for="(card, index) in settings.about_feature_cards"
                        :key="index"
                        :class="['group backdrop-blur-md rounded-2xl p-6 border hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer', `bg-gradient-to-br ${card.bg_gradient}`, card.border]"
                    >
                        <div class="flex items-start gap-4">
                            <div :class="['w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-all duration-300', `bg-gradient-to-br ${card.gradient}`]">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path v-if="index === 0" d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/>
                                    <path v-else-if="index === 1" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                    <path v-else-if="index === 2" d="M20 6h-2.18c.11-.31.18-.65.18-1 0-1.66-1.34-3-3-3-1.05 0-1.96.54-2.5 1.35l-.5.67-.5-.68C10.96 2.54 10.05 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-5-2c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zM9 4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm11 15H4v-2h16v2zm0-5H4V8h5.08L7 10.83 8.62 12 11 8.76l1-1.36 1 1.36L15.38 12 17 10.83 14.92 8H20v6z"/>
                                    <path v-else d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-900 text-lg mb-1">{{ card.title }}</h3>
                                <p class="text-sm text-gray-600 leading-relaxed">{{ card.description }}</p>
                            </div>
                        </div>
                        <div :class="['w-0 group-hover:w-full h-1 rounded-full transition-all duration-500 mt-4', `bg-gradient-to-r ${card.gradient}`]"></div>
                    </div>
                </div>
            </div>

            <!-- Bottom CTA Section -->
            <div class="backdrop-blur-md bg-gradient-to-r from-audiogold-600 via-audiogold-700 to-audiogold-800 rounded-3xl p-12 shadow-2xl relative overflow-hidden">
                <div class="absolute inset-0 opacity-10">
                    <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                            <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                        </pattern>
                        <rect width="100" height="100" fill="url(#grid)" />
                    </svg>
                </div>

                <div class="relative z-10 text-center">
                    <h3 class="text-3xl md:text-4xl font-bold text-white mb-4">
                        {{ settings.about_cta_title }}
                    </h3>
                    <p class="text-xl text-audiogold-100 mb-8 max-w-2xl mx-auto">
                        {{ settings.about_cta_subtitle }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a :href="settings.about_cta_primary_link" class="group inline-flex items-center justify-center px-8 py-4 bg-white text-audiogold-700 rounded-2xl font-semibold hover:bg-audiogold-50 transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105">
                            <span>{{ settings.about_cta_primary_text }}</span>
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                        <a :href="settings.about_cta_secondary_link" class="group inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-white text-white rounded-2xl font-semibold hover:bg-white hover:text-audiogold-700 transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105">
                            <span>{{ settings.about_cta_secondary_text }}</span>
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background decorative elements -->
        <div class="absolute top-20 right-10 w-72 h-72 bg-gradient-to-br from-audiogold-200 to-audiogold-300 rounded-full blur-3xl opacity-20 animate-float"></div>
        <div class="absolute bottom-20 left-10 w-96 h-96 bg-gradient-to-br from-blue-200 to-purple-300 rounded-full blur-3xl opacity-20 animate-float-slow"></div>
    </section>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
    settings: {
        type: Object,
        required: true,
    },
});

const formattedParagraph1 = computed(() => {
    return props.settings.about_story_paragraph1.replace(
        'AudioGold',
        '<span class="font-bold text-audiogold-700">AudioGold</span>'
    );
});
</script>

<style scoped>
@keyframes float {
    0%, 100% {
        transform: translateY(0px) scale(1);
    }
    50% {
        transform: translateY(-20px) scale(1.05);
    }
}

@keyframes float-slow {
    0%, 100% {
        transform: translateY(0px) translateX(0px);
    }
    50% {
        transform: translateY(-30px) translateX(20px);
    }
}

.animate-float {
    animation: float 8s ease-in-out infinite;
}

.animate-float-slow {
    animation: float-slow 12s ease-in-out infinite;
}
</style>
