<template>
    <section id="about" class="py-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <div class="max-w-7xl mx-auto relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-fade-in">
                <div class="inline-block mb-4">
                    <span class="text-sm font-semibold text-audiogold-600 tracking-wider uppercase">About Us</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="bg-gradient-to-r from-audiogold-600 to-audiogold-800 bg-clip-text text-transparent">
                        Who We Are?
                    </span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-audiogold-500 to-audiogold-700 mx-auto rounded-full"></div>
            </div>

            <!-- Content -->
            <div class="backdrop-blur-md bg-white/60 rounded-3xl p-8 md:p-12 shadow-2xl border border-white/50 hover:shadow-3xl transition-all duration-500 group">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <!-- Text Content -->
                    <div class="space-y-6">
                        <div class="transform transition-all duration-500 hover:translate-x-2">
                            <p class="text-lg text-gray-700 leading-relaxed">
                                At <span class="font-bold text-audiogold-700">Audio Gold</span>, we redefine professional audio with a mission to make premium technology accessible to all.
                                With expertise rooted in global collaboration, we design innovative products that meet the demands of the Indian market.
                            </p>
                        </div>

                        <div class="transform transition-all duration-500 hover:translate-x-2">
                            <p class="text-lg text-gray-700 leading-relaxed">
                                Our unwavering commitment to quality, affordability, and performance makes us the trusted choice for professionals across the nation.
                                Whether you're looking to create magical lighting effects or deliver crystal-clear sound, Audio Gold has you covered.
                            </p>
                        </div>

                        <!-- Animated Stats -->
                        <div class="grid grid-cols-3 gap-4 pt-6">
                            <div class="text-center transform hover:scale-110 transition-transform duration-300">
                                <p class="text-3xl font-bold text-audiogold-600">50+</p>
                                <p class="text-sm text-gray-600">Products</p>
                            </div>
                            <div class="text-center transform hover:scale-110 transition-transform duration-300">
                                <p class="text-3xl font-bold text-audiogold-600">1000+</p>
                                <p class="text-sm text-gray-600">Customers</p>
                            </div>
                            <div class="text-center transform hover:scale-110 transition-transform duration-300">
                                <p class="text-3xl font-bold text-audiogold-600">100%</p>
                                <p class="text-sm text-gray-600">Quality</p>
                            </div>
                        </div>
                    </div>

                    <!-- Visual Element with Icons -->
                    <div class="grid grid-cols-2 gap-6">
                        <div class="backdrop-blur-md bg-gradient-to-br from-audiogold-100 to-audiogold-200 rounded-2xl p-6 border border-audiogold-300/50 shadow-lg hover:shadow-2xl transform hover:-translate-y-2 hover:rotate-2 transition-all duration-300 group/card cursor-pointer">
                            <div class="mb-4 transform group-hover/card:scale-110 group-hover/card:rotate-12 transition-all duration-300">
                                <svg class="w-16 h-16 text-audiogold-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 11.75c-.69 0-1.25.56-1.25 1.25s.56 1.25 1.25 1.25 1.25-.56 1.25-1.25-.56-1.25-1.25-1.25zm6 0c-.69 0-1.25.56-1.25 1.25s.56 1.25 1.25 1.25 1.25-.56 1.25-1.25-.56-1.25-1.25-1.25zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8 0-.29.02-.58.05-.86 2.36-1.05 4.23-2.98 5.21-5.37C11.07 8.33 14.05 10 17.42 10c.78 0 1.53-.09 2.25-.26.21.71.33 1.47.33 2.26 0 4.41-3.59 8-8 8z"/>
                                </svg>
                            </div>
                            <h3 class="font-bold text-audiogold-800 text-lg mb-2">Innovation</h3>
                            <p class="text-sm text-gray-700">Cutting-edge technology</p>
                            <div class="mt-3 w-0 group-hover/card:w-full h-0.5 bg-gradient-to-r from-audiogold-500 to-audiogold-700 transition-all duration-500"></div>
                        </div>

                        <div class="backdrop-blur-md bg-gradient-to-br from-audiogold-100 to-audiogold-200 rounded-2xl p-6 border border-audiogold-300/50 shadow-lg hover:shadow-2xl transform hover:-translate-y-2 hover:-rotate-2 transition-all duration-300 group/card cursor-pointer">
                            <div class="mb-4 transform group-hover/card:scale-110 group-hover/card:rotate-12 transition-all duration-300">
                                <svg class="w-16 h-16 text-audiogold-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                            </div>
                            <h3 class="font-bold text-audiogold-800 text-lg mb-2">Quality</h3>
                            <p class="text-sm text-gray-700">Premium standards</p>
                            <div class="mt-3 w-0 group-hover/card:w-full h-0.5 bg-gradient-to-r from-audiogold-500 to-audiogold-700 transition-all duration-500"></div>
                        </div>

                        <div class="backdrop-blur-md bg-gradient-to-br from-audiogold-100 to-audiogold-200 rounded-2xl p-6 border border-audiogold-300/50 shadow-lg hover:shadow-2xl transform hover:-translate-y-2 hover:rotate-2 transition-all duration-300 group/card cursor-pointer">
                            <div class="mb-4 transform group-hover/card:scale-110 group-hover/card:rotate-12 transition-all duration-300">
                                <svg class="w-16 h-16 text-audiogold-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                                </svg>
                            </div>
                            <h3 class="font-bold text-audiogold-800 text-lg mb-2">Professional</h3>
                            <p class="text-sm text-gray-700">Expert solutions</p>
                            <div class="mt-3 w-0 group-hover/card:w-full h-0.5 bg-gradient-to-r from-audiogold-500 to-audiogold-700 transition-all duration-500"></div>
                        </div>

                        <div class="backdrop-blur-md bg-gradient-to-br from-audiogold-100 to-audiogold-200 rounded-2xl p-6 border border-audiogold-300/50 shadow-lg hover:shadow-2xl transform hover:-translate-y-2 hover:-rotate-2 transition-all duration-300 group/card cursor-pointer">
                            <div class="mb-4 transform group-hover/card:scale-110 group-hover/card:rotate-12 transition-all duration-300">
                                <svg class="w-16 h-16 text-audiogold-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                                </svg>
                            </div>
                            <h3 class="font-bold text-audiogold-800 text-lg mb-2">Trusted</h3>
                            <p class="text-sm text-gray-700">Reliable partner</p>
                            <div class="mt-3 w-0 group-hover/card:w-full h-0.5 bg-gradient-to-r from-audiogold-500 to-audiogold-700 transition-all duration-500"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background decorative elements -->
        <div class="absolute top-10 right-10 w-40 h-40 bg-gradient-to-br from-audiogold-200 to-audiogold-400 rounded-full blur-3xl opacity-20 animate-pulse-slow"></div>
        <div class="absolute bottom-10 left-10 w-32 h-32 bg-gradient-to-br from-audiogold-300 to-audiogold-500 rounded-full blur-3xl opacity-20 animate-pulse-slow" style="animation-delay: 1.5s"></div>
    </section>
</template>

<script setup>
// About section component with enhanced animations
</script>

<style scoped>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fade-in 0.6s ease-out;
}
</style>
