<template>
    <section class="py-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden bg-white">
        <div class="max-w-7xl mx-auto relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-block mb-4">
                    <div class="backdrop-blur-sm bg-gradient-to-r from-purple-100 to-pink-100 border border-purple-200 rounded-full px-6 py-2 shadow-sm">
                        <p class="text-sm font-semibold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent flex items-center gap-2 justify-center">
                            <span class="w-2 h-2 bg-purple-500 rounded-full animate-pulse"></span>
                            {{ settings.why_badge }}
                        </p>
                    </div>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 bg-clip-text text-transparent">
                        {{ settings.why_title_line1 }}
                    </span>
                    <br />
                    <span class="bg-gradient-to-r from-audiogold-600 to-audiogold-800 bg-clip-text text-transparent">
                        {{ settings.why_title_line2 }}
                    </span>
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto mt-4">
                    {{ settings.why_subtitle }}
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid md:grid-cols-2 gap-8 mb-16">
                <div
                    v-for="(card, index) in settings.why_feature_cards"
                    :key="index"
                    class="group relative bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100 hover:shadow-2xl transition-all duration-500 overflow-hidden"
                >
                    <div :class="['absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-3xl', `bg-gradient-to-br ${card.bg_gradient}`]"></div>
                    <div class="relative z-10">
                        <div class="flex items-start space-x-6">
                            <div class="flex-shrink-0">
                                <div :class="['rounded-2xl p-4 transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-500 shadow-lg', `bg-gradient-to-br ${card.gradient}`]">
                                    <svg v-if="index === 0" class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                    </svg>
                                    <svg v-else class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M21 12.22C21 6.73 16.74 3 12 3c-4.69 0-9 3.65-9 9.28-.6.34-1 .98-1 1.72v2c0 1.1.9 2 2 2h1v-6.1c0-3.87 3.13-7 7-7s7 3.13 7 7V19h-8v2h8c1.1 0 2-.9 2-2v-1.22c.59-.31 1-.92 1-1.64v-2.3c0-.7-.41-1.31-1-1.62z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ card.title }}</h3>
                                <div class="space-y-3">
                                    <div v-for="(feature, fIndex) in card.features" :key="fIndex" class="flex items-start space-x-3">
                                        <div :class="['w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5', `bg-gradient-to-r ${card.gradient}`]">
                                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                                            </svg>
                                        </div>
                                        <p class="text-gray-700">{{ feature }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div
                    v-for="(stat, index) in settings.why_stats"
                    :key="index"
                    :class="['group relative rounded-2xl p-8 text-center shadow-lg hover:shadow-xl transition-all duration-500 overflow-hidden', `bg-gradient-to-br ${stat.bg_gradient}`, stat.border]"
                >
                    <div :class="['absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500', `bg-gradient-to-br ${stat.gradient.replace('from-', 'from-').replace('to-', 'to-')}/10`]"></div>
                    <div class="relative z-10">
                        <p :class="['text-5xl font-bold bg-clip-text text-transparent mb-2', `bg-gradient-to-br ${stat.gradient}`]">{{ stat.value }}</p>
                        <p class="text-gray-700 font-semibold">{{ stat.label }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background decorative elements -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-gradient-to-br from-blue-200 to-cyan-200 rounded-full blur-3xl opacity-20"></div>
        <div class="absolute bottom-20 right-10 w-64 h-64 bg-gradient-to-br from-purple-200 to-pink-200 rounded-full blur-3xl opacity-20"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-full blur-3xl opacity-10"></div>
    </section>
</template>

<script setup>
defineProps({
    settings: {
        type: Object,
        required: true,
    },
});
</script>
