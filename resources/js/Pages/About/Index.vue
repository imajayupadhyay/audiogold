<template>
    <Head>
        <title>About AudioGold - Our Story & Mission | Professional Audio Equipment</title>
        <meta name="description" content="Learn about AudioGold's journey since 2010. We design and manufacture premium professional audio amplifiers in India, combining innovation with affordability for audiophiles and professionals." />
        <meta name="keywords" content="about AudioGold, audio company India, amplifier manufacturer, professional audio brand" />
    </Head>

    <MainLayout>
        <template #background>
            <AnimatedBackground />
        </template>

        <div class="relative pt-32 pb-20">
            <!-- Hero Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="text-center">
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-audiogold-500 to-audiogold-600 text-white text-sm font-semibold mb-6 shadow-lg animate-float">
                        {{ aboutSettings.hero_badge }}
                    </div>
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6">
                        <span class="block text-gray-800 mb-2">{{ aboutSettings.hero_title_line1 }}</span>
                        <span class="block bg-gradient-to-r from-audiogold-600 via-audiogold-700 to-audiogold-800 bg-clip-text text-transparent">
                            {{ aboutSettings.hero_title_line2 }}
                        </span>
                    </h1>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        {{ aboutSettings.hero_subtitle }}
                    </p>
                </div>
            </section>

            <!-- Story Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="backdrop-blur-md bg-white/60 rounded-3xl p-8 shadow-xl border border-audiogold-200/50 hover:shadow-2xl transition-all duration-500 hover:scale-105">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ aboutSettings.story_title }}</h2>
                        <p class="text-gray-600 leading-relaxed whitespace-pre-line">{{ aboutSettings.story_content }}</p>
                    </div>

                    <div class="backdrop-blur-md bg-white/60 rounded-3xl p-8 shadow-xl border border-audiogold-200/50 hover:shadow-2xl transition-all duration-500 hover:scale-105">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ aboutSettings.mission_title }}</h2>
                        <p class="text-gray-600 leading-relaxed whitespace-pre-line">{{ aboutSettings.mission_content }}</p>
                    </div>
                </div>
            </section>

            <!-- Values Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
                <div class="text-center mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">{{ aboutSettings.values_title }}</h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        {{ aboutSettings.values_subtitle }}
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <div v-for="(value, index) in aboutSettings.values" :key="index"
                         class="backdrop-blur-md bg-white/60 rounded-3xl p-8 shadow-xl border border-audiogold-200/50 hover:shadow-2xl transition-all duration-500 hover:scale-105 group">
                        <div :class="[
                            'w-16 h-16 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:rotate-12 transition-transform duration-300',
                            value.gradient
                        ]">
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
                        <div v-for="(stat, index) in aboutSettings.stats" :key="index"
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
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">{{ aboutSettings.team_title }}</h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        {{ aboutSettings.team_subtitle }}
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <div v-for="(member, index) in aboutSettings.team_members" :key="index"
                         class="backdrop-blur-md bg-white/60 rounded-3xl p-8 shadow-xl border border-audiogold-200/50 hover:shadow-2xl transition-all duration-500 hover:scale-105 group text-center">
                        <div class="w-32 h-32 mx-auto mb-6 rounded-full overflow-hidden shadow-lg group-hover:scale-110 transition-transform duration-300 border-4 border-audiogold-200">
                            <img :src="member.image" :alt="member.name" class="w-full h-full object-cover" />
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
                            <h2 class="text-4xl font-bold text-gray-800 mb-6">{{ aboutSettings.innovation_title }}</h2>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                {{ aboutSettings.innovation_content }}
                            </p>
                            <div class="space-y-4">
                                <div v-for="(feature, index) in aboutSettings.innovations" :key="index"
                                     class="flex items-start space-x-3 group">
                                    <div :class="[
                                        'w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0 mt-1 group-hover:scale-125 transition-transform duration-300',
                                        getInnovationGradient(index)
                                    ]">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <p class="text-gray-700">{{ feature }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div v-for="(stat, index) in aboutSettings.innovation_stats" :key="index"
                                 :class="[
                                    'backdrop-blur-md rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105',
                                    getInnovationStatBg(stat.gradient || getDefaultGradient(index))
                                 ]">
                                <div :class="[
                                    'text-3xl font-bold mb-2 bg-clip-text text-transparent',
                                    getInnovationStatText(stat.gradient || getDefaultGradient(index))
                                ]">{{ stat.value }}</div>
                                <div class="text-gray-700 font-semibold">{{ stat.label }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="backdrop-blur-md bg-gradient-to-r from-audiogold-600 to-audiogold-800 rounded-3xl p-12 text-center shadow-2xl">
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">{{ aboutSettings.cta_title }}</h2>
                    <p class="text-audiogold-100 text-xl mb-8 max-w-2xl mx-auto">
                        {{ aboutSettings.cta_subtitle }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a :href="aboutSettings.cta_primary_link"
                           class="inline-flex items-center justify-center px-8 py-4 bg-white text-audiogold-600 rounded-full font-semibold hover:bg-audiogold-50 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                            {{ aboutSettings.cta_primary_text }}
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a :href="aboutSettings.cta_secondary_link"
                           class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-white text-white rounded-full font-semibold hover:bg-white hover:text-audiogold-600 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                            {{ aboutSettings.cta_secondary_text }}
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </MainLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import AnimatedBackground from '@/Pages/Home/Components/AnimatedBackground.vue';

const props = defineProps({
    aboutSettings: {
        type: Object,
        required: true
    }
});

const getInnovationGradient = (index) => {
    const gradients = [
        'bg-gradient-to-br from-blue-500 to-cyan-600',
        'bg-gradient-to-br from-purple-500 to-pink-600',
        'bg-gradient-to-br from-green-500 to-emerald-600',
        'bg-gradient-to-br from-orange-500 to-amber-600',
        'bg-gradient-to-br from-red-500 to-rose-600'
    ];
    return gradients[index % gradients.length];
};

const getDefaultGradient = (index) => {
    const gradients = [
        'from-blue-500 to-cyan-600',
        'from-purple-500 to-pink-600',
        'from-green-500 to-emerald-600',
        'from-orange-500 to-amber-600'
    ];
    return gradients[index % gradients.length];
};

const getInnovationStatBg = (gradient) => {
    const bgMap = {
        'from-blue-500 to-cyan-600': 'bg-gradient-to-br from-blue-100 to-cyan-100',
        'from-purple-500 to-pink-600': 'bg-gradient-to-br from-purple-100 to-pink-100',
        'from-green-500 to-emerald-600': 'bg-gradient-to-br from-green-100 to-emerald-100',
        'from-orange-500 to-amber-600': 'bg-gradient-to-br from-orange-100 to-amber-100'
    };
    return bgMap[gradient] || 'bg-gradient-to-br from-blue-100 to-cyan-100';
};

const getInnovationStatText = (gradient) => {
    const textMap = {
        'from-blue-500 to-cyan-600': 'bg-gradient-to-br from-blue-600 to-cyan-600',
        'from-purple-500 to-pink-600': 'bg-gradient-to-br from-purple-600 to-pink-600',
        'from-green-500 to-emerald-600': 'bg-gradient-to-br from-green-600 to-emerald-600',
        'from-orange-500 to-amber-600': 'bg-gradient-to-br from-orange-600 to-amber-600'
    };
    return textMap[gradient] || 'bg-gradient-to-br from-blue-600 to-cyan-600';
};
</script>
