<template>
    <nav class="fixed w-full z-50 top-0">
        <div class="backdrop-blur-md bg-white/70 border-b border-audiogold-200/50 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="/" class="flex items-center space-x-2">
                            <svg class="w-10 h-10 text-audiogold-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 3v9.28c-.47-.17-.97-.28-1.5-.28C8.01 12 6 14.01 6 16.5S8.01 21 10.5 21c2.31 0 4.2-1.75 4.45-4H15V6h4V3h-7z"/>
                            </svg>
                            <span class="text-2xl font-bold bg-gradient-to-r from-audiogold-600 to-audiogold-800 bg-clip-text text-transparent">
                                AudioGold
                            </span>
                        </a>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="hidden md:flex items-center space-x-8">
                        <a v-for="link in navLinks" :key="link.name"
                           :href="link.href"
                           class="text-gray-700 hover:text-audiogold-600 transition-colors duration-200 font-medium">
                            {{ link.name }}
                        </a>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="md:hidden">
                        <button @click="mobileMenuOpen = !mobileMenuOpen"
                                class="text-gray-700 hover:text-audiogold-600 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path v-if="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                                <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu -->
            <div v-if="mobileMenuOpen" class="md:hidden backdrop-blur-md bg-white/90 border-t border-audiogold-200/50">
                <div class="px-4 pt-2 pb-4 space-y-2">
                    <a v-for="link in navLinks" :key="link.name"
                       :href="link.href"
                       class="block px-3 py-2 rounded-lg text-gray-700 hover:text-audiogold-600 hover:bg-audiogold-50 transition-colors duration-200 font-medium">
                        {{ link.name }}
                    </a>
                </div>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { ref } from 'vue';

const mobileMenuOpen = ref(false);

const navLinks = [
    { name: 'Home', href: '/' },
    { name: 'Products', href: '/products' },
    { name: 'About us', href: '/about' },
    { name: "FAQ's", href: '/faq' },
    { name: 'Support', href: '/support' },
    { name: 'Contact', href: '/contact' },
];
</script>
