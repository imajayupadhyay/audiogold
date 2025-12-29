<template>
    <section class="relative min-h-screen flex items-center pt-20 px-4 sm:px-6 lg:px-8 overflow-hidden bg-gradient-to-br from-orange-50 via-white to-amber-50">
        <div class="max-w-7xl mx-auto w-full">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="space-y-8 animate-fade-in-up">
                    <!-- Badge -->
                    <div class="inline-block">
                        <div class="backdrop-blur-md bg-gradient-to-r from-audiogold-100 to-audiogold-200 border border-audiogold-300 rounded-full px-6 py-2 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                            <p class="text-sm font-semibold text-audiogold-800 flex items-center gap-2">
                                <span class="w-2 h-2 bg-audiogold-600 rounded-full animate-pulse"></span>
                                Premium Audio Equipment
                            </p>
                        </div>
                    </div>

                    <!-- Main Heading -->
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold leading-tight">
                        <span class="block text-gray-800 mb-2">Experience</span>
                        <span class="block bg-gradient-to-r from-audiogold-600 via-audiogold-700 to-audiogold-800 bg-clip-text text-transparent animate-gradient">
                            Crystal Clear Sound
                        </span>
                    </h1>

                    <p class="text-xl md:text-2xl text-gray-600 leading-relaxed max-w-xl">
                        Making premium professional audio technology accessible to everyone across India.
                    </p>

                    <!-- Features List -->
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 group">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-r from-audiogold-500 to-audiogold-600 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                                </svg>
                            </div>
                            <p class="text-gray-700 font-medium">Professional-grade amplifiers</p>
                        </div>
                        <div class="flex items-center gap-3 group">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-r from-audiogold-500 to-audiogold-600 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                                </svg>
                            </div>
                            <p class="text-gray-700 font-medium">Affordable premium quality</p>
                        </div>
                        <div class="flex items-center gap-3 group">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-r from-audiogold-500 to-audiogold-600 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                                </svg>
                            </div>
                            <p class="text-gray-700 font-medium">Expert support & service</p>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="#products"
                           class="group px-8 py-4 bg-gradient-to-r from-audiogold-600 to-audiogold-700 text-white rounded-2xl font-semibold hover:from-audiogold-700 hover:to-audiogold-800 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1 flex items-center justify-center gap-2">
                            Explore Products
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                        <a href="#contact"
                           class="group px-8 py-4 backdrop-blur-md bg-white/80 text-audiogold-700 rounded-2xl font-semibold border-2 border-audiogold-400 hover:bg-audiogold-50 hover:border-audiogold-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center justify-center gap-2">
                            Get in Touch
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Right Visual Elements -->
                <div class="relative lg:h-[600px] hidden lg:block">
                    <!-- Floating Cards -->
                    <div class="absolute top-0 right-0 w-64 backdrop-blur-md bg-white/70 rounded-3xl p-6 shadow-2xl border border-white/50 animate-float hover:shadow-3xl transition-shadow duration-300 hover:scale-105 cursor-pointer group">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-audiogold-400 to-audiogold-600 flex items-center justify-center mb-4 group-hover:rotate-6 transition-transform duration-300">
                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Premium Amplifiers</h3>
                        <p class="text-sm text-gray-600">Professional-grade sound systems</p>
                        <div class="mt-4 flex items-center text-audiogold-600 font-semibold text-sm group-hover:gap-2 transition-all duration-300">
                            Learn more
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>

                    <div class="absolute top-40 left-0 w-64 backdrop-blur-md bg-white/70 rounded-3xl p-6 shadow-2xl border border-white/50 animate-float-slow hover:shadow-3xl transition-shadow duration-300 hover:scale-105 cursor-pointer group">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-audiogold-500 to-audiogold-700 flex items-center justify-center mb-4 group-hover:rotate-6 transition-transform duration-300">
                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 1c-4.97 0-9 4.03-9 9v7c0 1.66 1.34 3 3 3h3v-8H5v-2c0-3.87 3.13-7 7-7s7 3.13 7 7v2h-4v8h3c1.66 0 3-1.34 3-3v-7c0-4.97-4.03-9-9-9z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Quality Sound</h3>
                        <p class="text-sm text-gray-600">Crystal-clear audio experience</p>
                        <div class="mt-4 flex items-center text-audiogold-600 font-semibold text-sm group-hover:gap-2 transition-all duration-300">
                            Learn more
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>

                    <div class="absolute bottom-10 right-20 w-64 backdrop-blur-md bg-white/70 rounded-3xl p-6 shadow-2xl border border-white/50 animate-float-slower hover:shadow-3xl transition-shadow duration-300 hover:scale-105 cursor-pointer group">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-audiogold-600 to-audiogold-800 flex items-center justify-center mb-4 group-hover:rotate-6 transition-transform duration-300">
                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Trusted Quality</h3>
                        <p class="text-sm text-gray-600">1000+ satisfied customers</p>
                        <div class="mt-4 flex items-center text-audiogold-600 font-semibold text-sm group-hover:gap-2 transition-all duration-300">
                            Learn more
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Decorative elements -->
                    <div class="absolute top-20 right-40 w-32 h-32 bg-gradient-to-br from-audiogold-300 to-audiogold-500 rounded-full blur-3xl opacity-30 animate-pulse-slow"></div>
                    <div class="absolute bottom-20 left-20 w-40 h-40 bg-gradient-to-br from-audiogold-400 to-audiogold-600 rounded-full blur-3xl opacity-30 animate-pulse-slow" style="animation-delay: 1s"></div>
                </div>
            </div>
        </div>

    </section>
</template>

<script setup>
// Modern hero section with split-screen design
</script>

<style scoped>
@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes gradient {
    0%, 100% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
}

.animate-fade-in-up {
    animation: fade-in-up 0.8s ease-out;
}

.animate-gradient {
    background-size: 200% auto;
    animation: gradient 3s ease infinite;
}
</style>
