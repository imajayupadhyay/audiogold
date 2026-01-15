<template>
    <section class="relative min-h-screen flex items-center overflow-hidden">
        <!-- Image Slider Background -->
        <div class="absolute inset-0">
            <transition-group name="slide-fade">
                <div
                    v-for="(slide, index) in slides"
                    :key="slide.id"
                    v-show="currentSlide === index"
                    class="absolute inset-0"
                >
                    <!-- Background Image -->
                    <img
                        :src="slide.image"
                        :alt="slide.title"
                        class="w-full h-full object-cover scale-110 animate-ken-burns"
                    />
                    <!-- Dark Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-black/30"></div>
                </div>
            </transition-group>
        </div>

        <!-- Content Overlay -->
        <div class="relative z-10 w-full px-4 sm:px-6 lg:px-8 pt-20">
            <div class="max-w-7xl mx-auto">
                <div class="relative max-w-3xl">
                    <transition name="content-slide" mode="out-in">
                        <div
                            :key="`content-${currentSlideData.id}`"
                            class="space-y-8"
                        >
                        <!-- Badge -->
                        <div v-if="currentSlideData.badge" class="inline-block">
                            <div class="backdrop-blur-md bg-white/20 border border-white/30 rounded-full px-6 py-2 shadow-xl">
                                <p class="text-sm font-semibold text-white flex items-center gap-2">
                                    <span class="w-2 h-2 bg-audiogold-400 rounded-full animate-pulse"></span>
                                    {{ currentSlideData.badge }}
                                </p>
                            </div>
                        </div>

                        <!-- Main Heading -->
                        <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold leading-tight">
                            <span class="block text-white mb-2">{{ currentSlideData.title }}</span>
                            <span class="block bg-gradient-to-r from-audiogold-400 via-audiogold-500 to-audiogold-600 bg-clip-text text-transparent">
                                {{ currentSlideData.subtitle }}
                            </span>
                        </h1>

                        <p class="text-xl md:text-2xl text-gray-200 leading-relaxed">
                            {{ currentSlideData.description }}
                        </p>

                        <!-- Features List -->
                        <div v-if="currentSlideData.features && currentSlideData.features.length > 0" class="space-y-3">
                            <div v-for="(feature, fIndex) in currentSlideData.features" :key="fIndex" class="flex items-center gap-3 group">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-r from-audiogold-500 to-audiogold-600 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                                    </svg>
                                </div>
                                <p class="text-white font-medium">{{ feature }}</p>
                            </div>
                        </div>

                        <!-- CTA Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-4">
                            <a :href="currentSlideData.button_link || '/products'"
                               class="group px-8 py-4 bg-gradient-to-r from-audiogold-500 to-audiogold-600 text-white rounded-2xl font-semibold hover:from-audiogold-600 hover:to-audiogold-700 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1 flex items-center justify-center gap-2">
                                {{ currentSlideData.button_text || 'Explore Products' }}
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </a>
                            <a v-if="currentSlideData.secondary_button_text" :href="currentSlideData.secondary_button_link || '#contact'"
                               class="group px-8 py-4 backdrop-blur-md bg-white/20 text-white rounded-2xl font-semibold border-2 border-white/40 hover:bg-white/30 hover:border-white/60 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center justify-center gap-2">
                                {{ currentSlideData.secondary_button_text }}
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </a>
                        </div>
                        </div>
                    </transition>
                </div>
            </div>
        </div>

        <!-- Slider Navigation Dots -->
        <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 z-20 flex gap-3">
            <button
                v-for="(slide, index) in slides"
                :key="`dot-${slide.id}`"
                @click="goToSlide(index)"
                :class="[
                    'transition-all duration-300 rounded-full',
                    currentSlide === index
                        ? 'w-12 h-3 bg-audiogold-500'
                        : 'w-3 h-3 bg-white/50 hover:bg-white/80'
                ]"
                :aria-label="`Go to slide ${index + 1}`"
            ></button>
        </div>

        <!-- Slider Navigation Arrows -->
        <button
            @click="prevSlide"
            class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full backdrop-blur-md bg-white/20 border border-white/30 flex items-center justify-center text-white hover:bg-white/30 transition-all duration-300 hover:scale-110"
            aria-label="Previous slide"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
        <button
            @click="nextSlide"
            class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full backdrop-blur-md bg-white/20 border border-white/30 flex items-center justify-center text-white hover:bg-white/30 transition-all duration-300 hover:scale-110"
            aria-label="Next slide"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>
    </section>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue';

const props = defineProps({
    slides: {
        type: Array,
        default: () => [],
    },
});

const currentSlide = ref(0);
let slideInterval = null;

// Default slides for fallback
const defaultSlides = [
    {
        id: 1,
        image: 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=1920&h=1080&fit=crop&q=80',
        badge: 'Premium Audio Equipment',
        title: 'Experience',
        subtitle: 'Crystal Clear Sound',
        description: 'Making premium professional audio technology accessible to everyone across India.',
        features: [
            'Professional-grade amplifiers',
            'Affordable premium quality',
            'Expert support & service'
        ],
        button_text: 'Explore Products',
        button_link: '/products',
        secondary_button_text: 'Get in Touch',
        secondary_button_link: '#contact',
    },
    {
        id: 2,
        image: 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?w=1920&h=1080&fit=crop&q=80',
        badge: 'Industry Leading',
        title: 'Power Your',
        subtitle: 'Sound System',
        description: 'Advanced audio amplification solutions designed for commercial and professional applications.',
        features: [
            'High-power output capability',
            'Advanced thermal management',
            'Rack-mountable design'
        ],
        button_text: 'Explore Products',
        button_link: '/products',
        secondary_button_text: 'Get in Touch',
        secondary_button_link: '#contact',
    },
    {
        id: 3,
        image: 'https://images.unsplash.com/photo-1598653222000-6b7b7a552625?w=1920&h=1080&fit=crop&q=80',
        badge: 'Trusted by Professionals',
        title: 'Elevate Your',
        subtitle: 'Audio Experience',
        description: 'Join 1000+ satisfied customers who trust AudioGold for their audio needs.',
        features: [
            '2-year comprehensive warranty',
            '24/7 technical support',
            'Pan-India service network'
        ],
        button_text: 'Explore Products',
        button_link: '/products',
        secondary_button_text: 'Get in Touch',
        secondary_button_link: '#contact',
    }
];

// Use provided slides or fallback to defaults
const slides = computed(() => {
    return props.slides && props.slides.length > 0 ? props.slides : defaultSlides;
});

// Current slide data
const currentSlideData = computed(() => {
    return slides.value[currentSlide.value] || slides.value[0];
});

const nextSlide = () => {
    currentSlide.value = (currentSlide.value + 1) % slides.value.length;
};

const prevSlide = () => {
    currentSlide.value = currentSlide.value === 0 ? slides.value.length - 1 : currentSlide.value - 1;
};

const goToSlide = (index) => {
    currentSlide.value = index;
};

const startAutoPlay = () => {
    slideInterval = setInterval(() => {
        nextSlide();
    }, 5000); // Change slide every 5 seconds
};

const stopAutoPlay = () => {
    if (slideInterval) {
        clearInterval(slideInterval);
    }
};

onMounted(() => {
    startAutoPlay();
});

onUnmounted(() => {
    stopAutoPlay();
});
</script>

<style scoped>
/* Slide Transitions */
.slide-fade-enter-active,
.slide-fade-leave-active {
    transition: opacity 1s ease-in-out;
}

.slide-fade-enter-from {
    opacity: 0;
}

.slide-fade-leave-to {
    opacity: 0;
}

/* Content Slide Transitions */
.content-slide-enter-active {
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.content-slide-leave-active {
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.content-slide-enter-from {
    opacity: 0;
    transform: translateX(30px);
}

.content-slide-leave-to {
    opacity: 0;
    transform: translateX(-30px);
}

/* Ken Burns Effect */
@keyframes ken-burns {
    0% {
        transform: scale(1);
    }
    100% {
        transform: scale(1.1);
    }
}

.animate-ken-burns {
    animation: ken-burns 20s ease-out infinite alternate;
}
</style>
